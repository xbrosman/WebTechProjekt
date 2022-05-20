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
    ```

3) To build laravel project run:
    ```
    ./vendor/bin/sail up --build
    ```
    >To stop all containers
        ```
        ./vendor/bin/sail down
        ``` 
