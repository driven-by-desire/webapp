#### Prerequisite:
1. Point the virtual host document root to public/ directory for security? for simplicity we can use index.php and no public directory is needed
2. logs/ should be web writable.
3. Process Flow:
    - public/index.php OR /index.php
    - instantiate request as per Route
    - call respective controller
    - process request and send response
4. redis caching?


> .
> ├── composer.json       # dotenv
> ├── .env                # gitignored | usage : dotenv
> ├── vendor              # gitignored | usage : dotenv
> ├── .gitignore          # vendor/* and .env
> ├── app
>     ├── service         # all services like header, response and request classes
>         ├── HeaderService.php       # uses core/Header.php | can write custom methods as per app requirement for handling Headers 
>         ├── RequestService.php      # uses core/Request.php | can write custom methods as per app requirement for handling Requests 
>         ├── ResponseService.php     # uses core/Response.php | can write custom methods as per app requirement for handling Responses 
>     ├── helper
>         ├── CRUD.php    # to be used by Model Classes, uses core/Database Class
>         ├── Route.php   # to get the Controller
>         ├── Redis.php   # for Redis Caching
>     ├── middleware
>         ├── Authentication.php  # To be used for JWT Authentication, more structural changes may arrive for Auth module
>     ├── core
>         ├── Database.php        # Singleton class for initialization of Database Object with PDO conn
>         ├── Environment.php     # Uses .env environment configuration as an object since $_ENV can get modified
>         ├── Header.php          # Defines header configuration for the api calls, used by HeaderService
>         ├── Request.php         # Defines and creates a Request Object, used by RequestService
>         ├── Response.php        # Defines response types (JSON, XML, File [will do JSON only for now]) with appropriate header and HTTP code
>         ├── Exception.php       # For Error / Exception handling and creation of Error / Exception Logs.
>     ├── controller              # custom controller as per modules | nomenclature : UserController ( then check for header and request as per Service i.e. API or Browser )
>         ├── PostController.php  # controls the api action | uses authentication middleware class and Model class
>     ├── model                   # custom model as per modules
>         ├── PostModel.php       # is called by its controller, uses CRUD to provide data, can contain specific custom sql queries
> ├── public
>     ├── index.php #Party Starter -> calls Route -> calls Controller -> process() -> provides Response
> ├── logs        # exceptions and error logs
> ├── uploads     # file uploads
> ├── migrations  # all sql
> ├── cache       # to store cache files (if required)
> ├── resources   # to be used for react app / UI
>     ├── css             # UI / views
>     ├── js              # UI / views
>     ├── view            # UI / views HTML

