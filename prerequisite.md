#### Prerequisite:
1. Point the virtual host document root to public/ directory for security? for simplicity we can use index.php and no public directory is needed
2. logs/ should be web writable.
3. Process Flow:
    - public/index.php OR /index.php
    - instantiate request as per Route
    - call respective controller
    - process request and send response
4. redis caching?


> `.` <br>
> `├── composer.json       # dotenv` <br>
> `├── .env                # gitignored | usage : dotenv` <br>
> `├── vendor              # gitignored | usage : dotenv` <br>
> `├── .gitignore          # vendor/* and .env` <br>
> `├── app` <br>
> `    ├── service         # all services like header, response and request classes` <br>
> `        ├── HeaderService.php       # uses core/Header.php | can write custom methods as per app requirement for handling Headers ` <br>
> `        ├── RequestService.php      # uses core/Request.php | can write custom methods as per app requirement for handling Requests ` <br>
> `        ├── ResponseService.php     # uses core/Response.php | can write custom methods as per app requirement for handling Responses ` <br>
> `    ├── helper` <br>
> `        ├── CRUD.php    # to be used by Model Classes, uses core/Database Class` <br>
> `        ├── Route.php   # to get the Controller` <br>
> `        ├── Redis.php   # for Redis Caching` <br>
> `    ├── middleware` <br>
> `        ├── Authentication.php  # To be used for JWT Authentication, more structural changes may arrive for Auth module` <br>
> `    ├── core` <br>
> `        ├── Database.php        # Singleton class for initialization of Database Object with PDO conn` <br>
> `        ├── Environment.php     # Uses .env environment configuration as an object since $_ENV can get modified` <br>
> `        ├── Header.php          # Defines header configuration for the api calls, used by HeaderService` <br>
> `        ├── Request.php         # Defines and creates a Request Object, used by RequestService` <br>
> `        ├── Response.php        # Defines response types (JSON, XML, File [will do JSON only for now]) with appropriate header and HTTP code` <br>
> `        ├── Exception.php       # For Error / Exception handling and creation of Error / Exception Logs.` <br>
> `    ├── controller              # custom controller as per modules | nomenclature : UserController ( then check for header and request as per Service i.e. API or Browser )` <br>
> `        ├── PostController.php  # controls the api action | uses authentication middleware class and Model class` <br>
> `    ├── model                   # custom model as per modules` <br>
> `        ├── PostModel.php       # is called by its controller, uses CRUD to provide data, can contain specific custom sql queries` <br>
> `├── public` <br>
> `    ├── index.php #Party Starter ->calls Route ->calls Controller ->process() ->provides Response` <br>
> `├── logs        # exceptions and error logs` <br>
> `├── uploads     # file uploads` <br>
> `├── migrations  # all sql` <br>
> `├── cache       # to store cache files (if required)` <br>
> `├── resources   # to be used for react app / UI` <br>
> `    ├── css             # UI / views` <br>
> `    ├── js              # UI / views` <br>
> `    ├── view            # UI / views HTML` <br>

