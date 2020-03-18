# Stiri oficiale

[![GitHub contributors](https://img.shields.io/github/contributors/code4romania/stiri-oficiale.svg?style=for-the-badge)](https://github.com/code4romania/stiri-oficiale/graphs/contributors) [![GitHub last commit](https://img.shields.io/github/last-commit/code4romania/stiri-oficiale.svg?style=for-the-badge)](https://github.com/code4romania/stiri-oficiale/commits/master) [![License: MPL 2.0](https://img.shields.io/badge/license-MPL%202.0-brightgreen.svg?style=for-the-badge)](https://opensource.org/licenses/MPL-2.0)

Insert bullets description of the project if available.

[See the project live](insert_link_here)

Give a short introduction of your project. Let this section explain the objectives or the motivation behind this project.

[Contributing](#contributing) | [Built with](#built-with) | [Repos and projects](#repos-and-projects) | [Deployment](#deployment) | [Feedback](#feedback) | [License](#license) | [About Code4Ro](#about-code4ro)

## Contributing

This project is built by amazing volunteers and you can be one of them! Here's a list of ways in [which you can contribute to this project](.github/CONTRIBUTING.md).

You can also list any pending features and planned improvements for the project here.

## Built With

### Programming languages

### Platforms

### Frontend framework

### Package managers

### Database technology & provider

## Repos and projects

Mention all related repos and projects.

## Development

### To bootstrap the project (Run this only once), run the following commands in your shell:

Install composer dependencies

```bash
$ docker run --rm -v ${PWD}:/app -v ~/.composer/auth.json:/root/.composer/auth.json -w /app composer:latest composer install --ignore-platform-reqs --no-scripts --no-interaction --prefer-dist --optimize-autoloader
```

Copy environment variables and start the application

```bash
$ cp .env.example .env
$ docker-compose up
```

Run database migrations

```bash
$ docker exec -it stiri-importante php artisan migrate
```

Generate app secret key, and personal access client keys

```bash
$ docker exec -it stiri-importante php artisan key:generate
$ docker exec -it stiri-importante php artisan optimize
```

### Every other time

```bash
$ docker-compose up
```

## Deployment

Guide users through getting your code up and running on their own system. In this section you can talk about:

1. Installation process
2. Software dependencies
3. Latest releases
4. API references

Describe and show how to build your code and run the tests.

## Feedback

-   Request a new feature on GitHub.
-   Vote for popular feature requests.
-   File a bug in GitHub Issues.
-   Email us with other feedback contact@code4.ro

## License

This project is licensed under the MPL 2.0 License - see the [LICENSE](LICENSE) file for details

## About Code4Ro

Started in 2016, Code for Romania is a civic tech NGO, official member of the Code for All network. We have a community of over 500 volunteers (developers, ux/ui, communications, data scientists, graphic designers, devops, it security and more) who work pro-bono for developing digital solutions to solve social problems. #techforsocialgood. If you want to learn more details about our projects [visit our site](https://www.code4.ro/en/) or if you want to talk to one of our staff members, please e-mail us at contact@code4.ro.

Last, but not least, we rely on donations to ensure the infrastructure, logistics and management of our community that is widely spread across 11 timezones, coding for social change to make Romania and the world a better place. If you want to support us, [you can do it here](https://code4.ro/en/donate/).
