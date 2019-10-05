## Hacktober Board

Hacktober-board is an unofficial **Open Issues Board** for [Hacktoberfest](https://digitalocean.com). This project is built in Laravel using MySQL as database.

It is intended to help users, especially beginners, finding issues they can contribute to in order to participate in [Hacktoberfest](https://hacktoberfest.digitalocean.com).


Initially created at the internal DigitalOcean Hackaton a.k.a. Shark-a-Hack, September 2019 edition.

Front-end Design by [Eileen Ani](https://github.com/eileenani).

## Setting Up a Dev Environment

A Docker dev environment is included. You'll need Docker and Docker Compose installed.

### Running the App on Docker

run Docker Compose with:
```
docker-compose up
```

When the containers are up, you need to create a new MySQL user by logging in the container:

```
docker-compose exec db bash
```

Log into MySQL:

```
mysql -u root -p
```

The root MySQL password for the `db` container is `h4ckt0b3rd3v`.

Then, create a new user while granting permissions to the `hacktober` database, then flush privileges:

```
GRANT ALL ON hacktober.* TO 'hacktober-user'@'%' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;
```

Exit the MySQL prompt and the container, coming back to your regular shell.

To create the database tables, run migrations inside the container:

```
docker-compose exec app php artisan migrate
```


To import real issues from Github, you'll need to define a Github API Token in the `.env` file. Look for the variable `GITHUB_API_TOKEN`.

After setting up the API key, you can import issues with:

```
docker-compose exec app php artisan hacktober:fetch
```

This will populate the database with real issues from Github.