## Hacktober Board

Hacktober-board is an unofficial **Open Issues Board** for [Hacktoberfest](https://digitalocean.com). This project is built in Laravel using MySQL as database.

It is intended to help users, especially beginners, finding issues they can contribute to in order to participate in [Hacktoberfest](https://hacktoberfest.digitalocean.com).

## Setting Up a Dev Environment
There is two different base configuration included to set up your Dev Environment nice and smoothly:

Vanilla _Docker/Docker Compose_ and _DDEV_ 

Just pic the one you are either more familiar with or that better fits your need.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

### Running the App on Docker/Docker Compose

You'll need Docker and Docker Compose installed. To set these up, you can follow [this tutorial](https://www.digitalocean.com/community/tutorials/how-to-install-docker-compose-on-ubuntu-18-04).

First, get the environment up and running with:
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

Then, create a new user while granting permissions to the `hacktober` database, and flush privileges:

```
GRANT ALL ON hacktober.* TO 'hacktober-user'@'%' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;
```

Exit the MySQL prompt and the container, coming back to your regular shell.

To create the database tables, run migrations inside the container:

```
docker-compose exec app php artisan migrate
```


To fill the database with sample data, run the `db:seed` command:

```
docker-compose exec app php artisan db:seed
```


To import real issues from Github, you'll need to define a Github API Token in the `.env` file. Look for the variable `GITHUB_API_TOKEN`.

After setting up the API key, you can import issues with:

```
docker-compose exec app php artisan hacktober:fetch
```

This will populate the database with real issues from Github.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

### Running the App on DDEV

You'll need Docker, Docker Compose and DDEV installed. To set these up, you can follow [this tutorial](https://www.ddev.com/get-started/).

First, get the environment up and running with:
```
ddev start
```

When DDEV is up you will need to install the app itself and all composer requirements:

```
ddev composer install
```

Next confiugre the application for use with ddev by copying the the .env.ddev.example file to .env:

```
cp .env.ddev.example .env
```

Set up the database:

DDEV ships with an empty database and a all user privileges set up.

To create the database tables, run migrations inside the container:

```
ddev exec php artisan migrate
```

To fill the database with sample data, run the `db:seed` command:

```
dddev exec php artisan db:seed
```


To import real issues from Github, you'll need to define a Github API Token in the `.env` file. Look for the variable `GITHUB_API_TOKEN`.

After setting up the API key, you can import issues with:

```
ddev exec php artisan hacktober:fetch
```

This will populate the database with real issues from Github.



## About

Hacktober-Board was initially created at the internal [DigitalOcean](https://digitalocean.com) Hackaton a.k.a. Shark-a-Hack, September 2019 edition.

The front-end was designed by [Eileen Ani](https://github.com/eileenani) based on the official Hacktoberfest page.

## Contributing

Contributions are welcome. Please create an issue or assign yourself an existing issue so everybody knows what is taken. This can be as easy as leaving a comment like "I'll grab this one" in the issue you want to work on :)

If you are new to open source and Git, you can check this excellent series on [How to Contribute to Open Source](https://www.digitalocean.com/community/tutorial_series/an-introduction-to-open-source) by [Lisa Tagliaferri](https://twitter.com/lisaironcutter) on the DigitalOcean Community.
