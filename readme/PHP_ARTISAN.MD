# php artisan

**Usage:**
`command [options] [arguments]`

---

### Options

| Option                       | Description                                                                                   |
|------------------------------|-----------------------------------------------------------------------------------------------|
| `-h`, `--help`               | Display help for the given command. When no command is given, display help for the list command|
| `--silent`                   | Do not output any message                                                                     |
| `-q`, `--quiet`              | Only errors are displayed. All other output is suppressed                                     |
| `-V`, `--version`            | Display this application version                                                              |
| `--ansi`, `--no-ansi`        | Force (or disable) ANSI output                                                                |
| `-n`, `--no-interaction`     | Do not ask any interactive question                                                           |
| `--env[=ENV]`                | The environment the command should run under                                                  |
| `-v`, `-vv`, `-vvv`, `--verbose` | Increase the verbosity of messages: 1 for normal output, 2 for more verbose, 3 for debug   |

---

### Available Commands

<details>
<summary><strong>General</strong></summary>

- **about** — Display basic information about your application
- **clear-compiled** — Remove the compiled class file
- **completion** — Dump the shell completion script
- **db** — Start a new database CLI session
- **docs** — Access the Laravel documentation
- **down** — Put the application into maintenance / demo mode
- **env** — Display the current framework environment
- **help** — Display help for a command
- **inspire** — Display an inspiring quote
- **list** — List commands
- **migrate** — Run the database migrations
- **optimize** — Cache framework bootstrap, configuration, and metadata to increase performance
- **pail** — Tails the application logs
- **serve** — Serve the application on the PHP development server
- **test** — Run the application tests
- **tinker** — Interact with your application
- **up** — Bring the application out of maintenance mode
</details>

<details>
<summary><strong>Authentication</strong></summary>

- **auth**
- **auth:clear-resets** — Flush expired password reset tokens
</details>

<details>
<summary><strong>Cache</strong></summary>

- **cache**
- **cache:clear** — Flush the application cache
- **cache:forget** — Remove an item from the cache
- **cache:prune-stale-tags** — Prune stale cache tags from the cache (Redis only)
</details>

<details>
<summary><strong>Channel</strong></summary>

- **channel**
- **channel:list** — List all registered private broadcast channels
</details>

<details>
<summary><strong>Config</strong></summary>

- **config**
- **config:cache** — Create a cache file for faster configuration loading
- **config:clear** — Remove the configuration cache file
- **config:publish** — Publish configuration files to your application
- **config:show** — Display all of the values for a given configuration file or key
</details>

<details>
<summary><strong>Database</strong></summary>

- **db**
- **db:monitor** — Monitor the number of connections on the specified database
- **db:seed** — Seed the database with records
- **db:show** — Display information about the given database
- **db:table** — Display information about the given database table
- **db:wipe** — Drop all tables, views, and types
</details>

<details>
<summary><strong>Environment</strong></summary>

- **env**
- **env:decrypt** — Decrypt an environment file
- **env:encrypt** — Encrypt an environment file
</details>

<details>
<summary><strong>Event</strong></summary>

- **event:cache** — Discover and cache the application's events and listeners
- **event:clear** — Clear all cached events and listeners
- **event:list** — List the application's events and listeners
</details>

<details>
<summary><strong>Install</strong></summary>

- **install:api** — Create an API routes file and install Laravel Sanctum or Laravel Passport
- **install:broadcasting** — Create a broadcasting channel routes file
</details>

<details>
<summary><strong>Key</strong></summary>

- **key:generate** — Set the application key
</details>

<details>
<summary><strong>Language</strong></summary>

- **lang:publish** — Publish all language files that are available for customization
</details>

<details>
<summary><strong>Make</strong></summary>

- **make:cache-table** — Create a migration for the cache database table
- **make:cast** — Create a new custom Eloquent cast class
- **make:channel** — Create a new channel class
- **make:class** — Create a new class
- **make:command** — Create a new Artisan command
- **make:component** — Create a new view component class
- **make:controller** — Create a new controller class
- **make:enum** — Create a new enum
- **make:event** — Create a new event class
- **make:exception** — Create a new custom exception class
- **make:factory** — Create a new model factory
- **make:interface** — Create a new interface
- **make:job** — Create a new job class
- **make:job-middleware** — Create a new job middleware class
- **make:listener** — Create a new event listener class
- **make:mail** — Create a new email class
- **make:middleware** — Create a new HTTP middleware class
- **make:migration** — Create a new migration file
- **make:model** — Create a new Eloquent model class
- **make:notification** — Create a new notification class
- **make:notifications-table** — Create a migration for the notifications table
- **make:observer** — Create a new observer class
- **make:policy** — Create a new policy class
- **make:provider** — Create a new service provider class
- **make:queue-batches-table** — Create a migration for the batches database table
- **make:queue-failed-table** — Create a migration for the failed queue jobs database table
- **make:queue-table** — Create a migration for the queue jobs database table
- **make:request** — Create a new form request class
- **make:resource** — Create a new resource
- **make:rule** — Create a new validation rule
- **make:scope** — Create a new scope class
- **make:seeder** — Create a new seeder class
- **make:session-table** — Create a migration for the session database table
- **make:test** — Create a new test class
- **make:trait** — Create a new trait
- **make:view** — Create a new view
</details>

<details>
<summary><strong>Migrate</strong></summary>

- **migrate:fresh** — Drop all tables and re-run all migrations
- **migrate:install** — Create the migration repository
- **migrate:refresh** — Reset and re-run all migrations
- **migrate:reset** — Rollback all database migrations
- **migrate:rollback** — Rollback the last database migration
- **migrate:status** — Show the status of each migration
</details>

<details>
<summary><strong>Model</strong></summary>

- **model:prune** — Prune models that are no longer needed
- **model:show** — Show information about an Eloquent model
</details>

<details>
<summary><strong>Optimize</strong></summary>

- **optimize:clear** — Remove the cached bootstrap files
</details>

<details>
<summary><strong>Package</strong></summary>

- **package:discover** — Rebuild the cached package manifest
</details>

<details>
<summary><strong>Queue</strong></summary>

- **queue:clear** — Delete all of the jobs from the specified queue
- **queue:failed** — List all of the failed queue jobs
- **queue:flush** — Flush all of the failed queue jobs
- **queue:forget** — Delete a failed queue job
- **queue:listen** — Listen to a given queue
- **queue:monitor** — Monitor the size of the specified queues
- **queue:prune-batches** — Prune stale entries from the batches database
- **queue:prune-failed** — Prune stale entries from the failed jobs table
- **queue:restart** — Restart queue worker daemons after their current job
- **queue:retry** — Retry a failed queue job
- **queue:retry-batch** — Retry the failed jobs for a batch
- **queue:work** — Start processing jobs on the queue as a daemon
</details>

<details>
<summary><strong>Route</strong></summary>

- **route:cache** — Create a route cache file for faster route registration
- **route:clear** — Remove the route cache file
- **route:list** — List all registered routes
</details>

<details>
<summary><strong>Sail</strong></summary>

- **sail:add** — Add a service to an existing Sail installation
- **sail:install** — Install Laravel Sail's default Docker Compose file
- **sail:publish** — Publish the Laravel Sail Docker files
</details>

<details>
<summary><strong>Schedule</strong></summary>

- **schedule:clear-cache** — Delete the cached mutex files created by scheduler
- **schedule:interrupt** — Interrupt the current schedule run
- **schedule:list** — List all scheduled tasks
- **schedule:run** — Run the scheduled commands
- **schedule:test** — Run a scheduled command
- **schedule:work** — Start the schedule worker
</details>

<details>
<summary><strong>Schema</strong></summary>

- **schema:dump** — Dump the given database schema
</details>

<details>
<summary><strong>Storage</strong></summary>

- **storage:link** — Create the symbolic links configured for the application
- **storage:unlink** — Delete existing symbolic links configured for the application
</details>

<details>
<summary><strong>Stub</strong></summary>

- **stub:publish** — Publish all stubs that are available for customization
</details>

<details>
<summary><strong>Vendor</strong></summary>

- **vendor:publish** — Publish any publishable assets from vendor packages
</details>

<details>
<summary><strong>View</strong></summary>

- **view:cache** — Compile all of the application's Blade templates
- **view:clear** — Clear all compiled view files
</details>

---

<details>
<summary><strong>View</strong></summary>
- <code>php artisan make:migration<code><br>
- <code>App\Models\Job::all()<code>
</details>

---

### `make:model` Command Details

**Description:**
Create a new Eloquent model class.

**Usage:**
```bash
php artisan make:model [options] [--] <name>
```

**Arguments:**

| Argument | Description                |
|----------|----------------------------|
| `<name>` | The name of the model      |

**Options:**

| Option                | Description                                                                                     |
|-----------------------|-------------------------------------------------------------------------------------------------|
| `-a`, `--all`         | Generate migration, seeder, factory, policy, resource controller, and form request classes      |
| `-c`, `--controller`  | Create a new controller for the model                                                          |
| `-f`, `--factory`     | Create a new factory for the model                                                             |
| `--force`             | Create the class even if the model already exists                                              |
| `-m`, `--migration`   | Create a new migration file for the model                                                      |
| `--morph-pivot`       | Indicates if the generated model should be a custom polymorphic intermediate table model       |
| `--policy`            | Create a new policy for the model                                                              |
| `-s`, `--seed`        | Create a new seeder for the model                                                              |
| `-p`, `--pivot`       | Indicates if the generated model should be a custom intermediate table model                   |
| `-r`, `--resource`    | Indicates if the generated controller should be a resource controller                          |
| `--api`               | Indicates if the generated controller should be an API resource controller                     |
| `-R`, `--requests`    | Create new form request classes and use them in the resource controller                        |
| `--test`              | Generate an accompanying Test test for the Model                                               |
| `--pest`              | Generate an accompanying Pest test for the Model                                               |
| `--phpunit`           | Generate an accompanying PHPUnit test for the Model                                            |
| `-h`, `--help`        | Display help for the given command                                                             |
| `--silent`            | Do not output any message                                                                      |
| `-q`, `--quiet`       | Only errors are displayed. All other output is suppressed                                      |
| `-V`, `--version`     | Display this application version                                                               |
| `--ansi`, `--no-ansi` | Force (or disable) ANSI output                                                                 |
| `-n`, `--no-interaction` | Do not ask any interactive question                                                         |
| `--env[=ENV]`         | The environment the command should run under                                                   |
| `-v`, `-vv`, `-vvv`, `--verbose` | Increase the verbosity of messages: 1 for normal, 2 for more verbose, 3 for debug   |

**Example:**
```bash
php artisan make:model Post -m -c -f
```
Creates a `Post` model with a migration, controller, and factory.

php artisan make:model CommentList -m
