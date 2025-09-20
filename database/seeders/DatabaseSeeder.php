<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Modules\LiveTV\database\seeders\LiveTvCategoryTableSeeder;
use Modules\LiveTV\database\seeders\LiveTvChannelTableSeeder;
use Modules\Ad\database\seeders\VastAdsSettingTableSeeder;
use Modules\Ad\database\seeders\CustomAdsSettingTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Clear cache before seeding
        Artisan::call('cache:clear');
        Schema::disableForeignKeyConstraints();

        // Clean storage/app/public
        File::cleanDirectory(storage_path('app/public'));

        if (env('IS_DUMMY_DATA') == false) {
            $this->call(AuthTableSeeder::class);
            $this->call(SettingSeeder::class);
            $this->call(\Modules\World\database\seeders\WorldDatabaseSeeder::class);
            $this->call(\Modules\Constant\database\seeders\ConstantDatabaseSeeder::class);
            $this->call(\Modules\Page\database\seeders\PageDatabaseSeeder::class);
            $this->call(\Modules\Subscriptions\database\seeders\PlanTableSeeder::class);
            $this->call(\Modules\Subscriptions\database\seeders\PlanlimitationTableSeeder::class);
            $this->call(\Modules\NotificationTemplate\database\seeders\NotificationTemplateSeeder::class);
            $this->call(\Modules\Tax\database\seeders\TaxDatabaseSeeder::class);
            $this->call(\Modules\Currency\database\seeders\CurrencyDatabaseSeeder::class);
            $this->call(MobileSettingsTableSeeder::class);
        } else {
            $this->call(AuthTableSeeder::class);
            $this->call(SettingSeeder::class);
            $this->call(UserProfilesSeeder::class);
            $this->call(UserSearchHistoriesSeeder::class);
            $this->call(UserWatchHistoriesSeeder::class);
            $this->call(\Modules\World\database\seeders\WorldDatabaseSeeder::class);
            $this->call(\Modules\Banner\database\seeders\BannerDatabaseSeeder::class);
            $this->call(\Modules\Constant\database\seeders\ConstantDatabaseSeeder::class);
            $this->call(\Modules\Genres\database\seeders\GenresDatabaseSeeder::class);
            $this->call(\Modules\CastCrew\database\seeders\CastCrewDatabaseSeeder::class);
            $this->call(\Modules\Entertainment\database\seeders\EntertainmentDatabaseSeeder::class);
            $this->call(\Modules\Entertainment\database\seeders\ReviewDatabaseSeeder::class);
            $this->call(\Modules\Season\database\seeders\SeasonDatabaseSeeder::class);
            $this->call(\Modules\Episode\database\seeders\EpisodeDatabaseSeeder::class);
            $this->call(\Modules\Page\database\seeders\PageDatabaseSeeder::class);
            $this->call(\Modules\Subscriptions\database\seeders\PlanTableSeeder::class);
            $this->call(\Modules\Subscriptions\database\seeders\PlanlimitationTableSeeder::class);
            $this->call(\Modules\Subscriptions\database\seeders\SubscriptionsTableSeeder::class);
            $this->call(\Modules\Subscriptions\database\seeders\PlanlimitationMappingTableSeeder::class);
            $this->call(\Modules\Subscriptions\database\seeders\SubscriptionsTransactionsTableSeeder::class);
            $this->call(\Modules\Video\database\seeders\VideoDatabaseSeeder::class);
            $this->call(\Modules\NotificationTemplate\database\seeders\NotificationTemplateSeeder::class);
            $this->call(\Modules\Entertainment\database\seeders\EntertainmentViewsTableSeeder::class);
            $this->call(\Modules\Entertainment\database\seeders\WatchlistDatabaseSeeder::class);
            $this->call(\Modules\Entertainment\database\seeders\LikesTableSeeder::class);
            $this->call(\Modules\FAQ\database\seeders\FAQDatabaseSeeder::class);
            $this->call(\Modules\Tax\database\seeders\TaxDatabaseSeeder::class);
            $this->call(\Modules\Entertainment\database\seeders\ContinueWatchTableSeeder::class);
            $this->call(\Modules\Currency\database\seeders\CurrencyDatabaseSeeder::class);
            $this->call(LiveTvCategoryTableSeeder::class);
            $this->call(LiveTvChannelTableSeeder::class);
            $this->call(MobileSettingsTableSeeder::class);
            $this->call(VastAdsSettingTableSeeder::class);
            $this->call(CustomAdsSettingTableSeeder::class);

            Schema::enableForeignKeyConstraints();
            Artisan::call('cache:clear');
        }

        // Clear cache again after seeding
        Artisan::call('cache:clear');

        // Instead of storage:link (not allowed on Hostinger shared hosting)
        if (! file_exists(public_path('storage'))) {
            File::copyDirectory(storage_path('app/public'), public_path('storage'));
        }

        // Remove chmod (not allowed on shared hosting)
        // If you need permissions → set via Hostinger File Manager
    }
}
