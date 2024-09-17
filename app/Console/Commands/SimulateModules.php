<?php

namespace App\Console\Commands;

use App\Enums\ModuleStatus;
use App\Models\Module;
use App\Models\ModuleData;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class SimulateModules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:simulate-modules';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simulate IoT modules behavior by generating data and random failures';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all modules
        $modules = Module::all();

        foreach ($modules as $module) {
            // Check if the module is currently active
            if ($module->status === ModuleStatus::ACTIVE->value) {
                // Generate random data for the module (e.g., temperature between 15 and 30 degrees)
                $value = rand(10, 30); // between 10 and 30

                // Get the unit from the module type
                $unit = $module->moduleType->unit ?? null; // by defaukt no unit
                
                // Simulate sending data to the module
                ModuleData::create([
                    'module_id'      => $module->id,
                    'measured_value' => $value,
                    $unit ?? 'unit'  => $unit,  // You can change this based on the module type
                    'timestamp'      => Carbon::now(),
                ]);

                // Update the module's data_sent_count and operation_duration
                $module->increment('data_sent_count');
                // Increment by 60 seconds (1 minute), because we will also call this command each minute
                $module->increment('operation_duration', 60);
                
                // Randomly simulate module failure
                if (rand(0, 100) < 5) { // 5% of chance of failure
                    $module->update(['status' => ModuleStatus::MALFUNCTION->value]);
                    $this->info("Module {$module->id} failed.");
                }
            } elseif ($module->status === ModuleStatus::MALFUNCTION->value) {
                // Randomly simulate repair
                if (rand(0, 100) < 10) { // 10% of chance of repair
                    $module->update(['status' => ModuleStatus::ACTIVE->value]);
                    $this->info("Module {$module->id} was repaired.");
                }
            }
        }

        $this->info('Module simulation complete.');
    }
}
