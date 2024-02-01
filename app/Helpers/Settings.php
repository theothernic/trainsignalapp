<?php
    namespace App\Helpers;

    use App\Services\SettingService;

    class Settings
    {
        public static function getSiteSettings(SettingService $settingService)
        {
            $data = $settingService->withContext('site');
        }
    }
