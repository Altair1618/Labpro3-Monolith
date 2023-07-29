# Labpro 3rd Selection (Monolith)
A Shopping App built with Laravel developed for Programming Lab Selection. The specification of this app can be seen [here](https://docs.google.com/document/d/1XERd5-yRuU-R7vK4Oe4REnQ4Nm8gL_bvDc37QQ7DoXI/edit).

## Author
- Farhan Nabil Suryono (13521114)

## How To Run
- Clone this repository
- Run `docker-compose up` command inside the repository folder
- Server is started on docker image

## Design Pattern
1. Design Pattern Builder </br>
Builder is a design pattern that allows us to create complex objects step by step. In this project, builder pattern is used in query builder. This is done to make the query builder more readable and easier to use. </br>
2. Design Pattern Chain of Responsibility </br>
Chain of Responsibility is a design pattern that allows us to divide many process into multiple handlers so that each handler only need to process a specific task. In this project, chain of responsibility is used in middlewares. For instances, middleware Validator is used to validate is the user requesting is authenticated or not. If the user is authenticated, the request will be passed to the next middleware. </br>
3. Design Pattern Strategy </br>
Strategy is a design pattern that allows us to change the algorithm of an object at runtime. In this project, strategy is used in creating credentials while authenticating user. For instances, if the user is authenticated using email, the email will be used as the credential, but if the user is authenticated using username, the username will be used as the credential. </br>

## Bonus
1. This project is deployed on 000webhost and can be accessed [here](https://labpro3-monolith.000webhostapp.com/login).
2. Every page in this project has lighthouse score more than equal to 95.
3. Every page in this project has responsive layout so that it can be accessed from mobile devices and computers.

## Tech Stacks
- laravel/framework (v10.10)
- tymon/jwt-auth (v2.0)

## Endpoints
<table>
    <thead>
        <td>Endpoint</td>
        <td>Description</td>
    </thead>
    <tbody>
        <tr>
            <td>GET `/`</td>
            <td>Automatically redirect to `/login` or `/catalog`</td>
        </tr>
        <tr>
            <td>GET `/register`</td>
            <td>Register Page [ALL]</td>
        </tr>
        <tr>
            <td>POST `/register`</td>
            <td>Register A New User</td>
        </tr>
        <tr>
            <td>GET `/login`</td>
            <td>Login Page [ALL]</td>
        </tr>
        <tr>
            <td>POST `/login`</td>
            <td>Login to System</td>
        </tr>
        <tr>
            <td>POST `/logout</td>
            <td>Logout from System</td>
        </tr>
        <tr>
            <td>GET `/catalog`</td>
            <td>Catalog Page [USER]</td>
        </tr>
        <tr>
            <td>GET `/catalog/:id`</td>
            <td>Item Detail Page [USER]</td>
        </tr>
        <tr>
            <td>GET `/buy/:id`</td>
            <td>Item Buy Page [USER]</td>
        </tr>
        <tr>
            <td>POST `/buy/:id`</td>
            <td>Buy an item and add the transaction to history</td>
        </tr>
        <tr>
            <td>GET `/history`</td>
            <td>Transaction History Page [USER]</td>
        </tr>
    </tbody>
</table>