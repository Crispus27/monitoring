<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Module;
use App\Models\History;
use Illuminate\Support\Facades\Log;
use App\Events\ModuleStatusChanged;

class GenerateHistories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-histories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $modules = Module::all();
        // Pour chaque module,on va génerer des données d'historique
        foreach ($modules as $module) {
            $generateHistoryData = $this->generateHistoryData($module->type);

            if (count($module->histories) > 0) {
                $oldStatus = $module->histories->last()->status;
            }else
            $oldStatus = 1;
            
            History::create([
                'module_id' => $module->id,
                'value' => $generateHistoryData["value"],
                'status' => $generateHistoryData["status"],
                'last_status_updated_at' => $generateHistoryData["status"],
            ]);

            // Vérifier si le statut a changé
            if ($generateHistoryData["status"] !== $oldStatus) {
                // Déclenche l'événement ModuleStatusChanged
                event(new ModuleStatusChanged($module)); // Envoyer l'événement
            }
        }

        $this->info('Données de module générées avec succès.');
    }
    private function generateHistoryData($type)
    {
        $status = 0;
        switch ($type) {
            // Cas pour les modules de type 'Température'
            // Si la value est supérieure à 0, le statut est défini à 1 (fonctionnement normal)

            case 'Température':
                $value = rand(-10, 35);
                if ($value > 0) {
                    $status = 1;
                }
                return ["value" => $value, "status" => $status];
            // Si la value est supérieure à 10, le statut est défini à 1

            case 'Vitesse':
                $value = rand(0, 180);
                if ($value > 10) {
                    $status = 1;
                }
                return ["value" => $value, "status" => $status];
            // Si la value est supérieure à 0, le statut est défini à 1
            default:
                $value = rand(-500, 500);
                if ($value > 0) {
                    $status = 1;
                }
                return ["value" => $value, "status" => $status];
        }
    }
}
