# LoginForm
Login Form Code Sample using Ajax, Bootstrap, jQuery, and PHP

## Security Features

This login form makes use of several security features including CSRF Tokens, Random Field Names, Password Hashing with a Salt and Parameterized Queries.

## CSRF Tokens

CSRF Tokens are used to prefent Cross-Site Request Forgeries. So another website could not easily attempt to make ajax calls because the tokens are generated and stored in the session.

## Random Field Names

Field names are randomly generated and stored for the session. Because field names are not predictable, this makes it difficult for hackers to create a form that points to your page.

## Password Hashing with a Salt

A Salt is a secret string of characters that is used for making the hash of the password very difficult to reverse engineer if database access was ever gained.

## Parameterized Queries

Queries are parameterized to avoid SQL injection. Because the parameters are bound to values in a separate call, this makes SQL injection much more difficult.
