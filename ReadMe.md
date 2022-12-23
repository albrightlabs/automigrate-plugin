# 🚀 Auto Migrate Plugin

### 🚨 Requires OctoberCMS 2.0

## ✨ What does this plugin do?
Automatically runs any migrations when on backend user login event.

## ❓ Why would I use this plugin?
Sometimes the console commands cannot be run manually but migrations need to be run after deployments. Since the base feature was removed in October 2.0, this provides the ability to enable the feature again.

## 🖥️ How do I install this plugin?
1. Clone this repository into `plugins/albrightlabs/automigrate`
2. Run the console command `php artisan october:migrate`
3. From the admin area, go to Settings > Auto Migrate and enable the feature

## ⏫ How do I update this plugin?
Run either of the following commands:
* From the project root, run `php artisan october:util git pull`
* From the plugin root, run `git pull`

## 🚨 Are there any requirements for this plugin?
Install the plugin, then go to Settings > Auto Migrate and enable the feature.

## ⚙️ Explanation of settings
* Enable the Auto Migration on backend user login feature

## ✨ Future plans
* None at this time but please send suggestions to support@albrightlabs.com.
