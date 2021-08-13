# Notes

- Command Line Interface (CLI) for seeding DB
- Create `commands` in `src/Corebase/Commands.php`
- Create class for DB population in `src/Command/...`
- Available Commands:
- - `php bin/console seed:patients` for [mysql, kb_doctor]
- Packages :
- - https://packagist.org/packages/catfan/medoo (DB Handler)
- - https://packagist.org/packages/mnapoli/silly (CLI)
- - https://packagist.org/packages/vlucas/phpdotenv (.env)