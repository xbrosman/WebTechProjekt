## Install 

Requirements for development environment on this project are: To have docker desktop installed and setup wsl integration.

1) Get code from github:        
        ```
        git clone https://github.com/xbrosman/WebTechProjekt.git
        ```

2) To install laravel sail run this commands:     
    ```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
    ```

3) To build laravel project run:
    ```
    ./vendor/bin/sail up --build
    ```
    >To just stop container
        ```
        ./vendor/bin/sail stop
        ``` 
    >To stop and delete all containers
        ```
        ./vendor/bin/sail down
        ``` 

## Laravel operations:
To create controller in laravel run:
`./vendor/bin/sail artisan make:controller SomeController`

To create all objects for database:
`./vendor/bin/sail artisan make:model Octave -mfsc`
    
1) -m To create migration (Table) and run: `./vendor/bin/sail artisan migrate`
2) -c To create controller
3) -f To create factory (Data structure used in seeder)
4) -s To create seed (Testing data)