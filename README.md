## Exercise 1 : E2E Application development
### Getting Started
1. Run the following commands
```
cp src/.env.example .env
composer install
php artisan migrate && php artisan key:generate
docker-compose up
```

2. Access Application through http://localhost:8000/

#### Extra: 
- The Demo has backpack included just to demo Rapid application development
- To Run backpack
1. Add User, run
```
docker-compose exec myapp php artisan backpack:user
```

2. Access  http://localhost:8000/admin & login

3. Orders Example will be found  http://localhost:8000/admin/orders



## Exercise 2: is also included in the same repo.

### Running Stats [Problem Solving Case]

1. Add csv file in /src e.g. order_log00.csv
2. Run the following command
```
php artisan orders:stats order_log00.csv
```