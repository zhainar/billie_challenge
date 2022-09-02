## Thoughts

- separating domain layers require better understanding of business processes
- this is not pseudocode at all, but this is more like draft of project. 
- the reason why I used message bus instead of setting factoring application status immediately is avoiding race condition. When creditor send two or more application at one time. Easier solution is to use one thread background worker that read data from message bus and passes data to domain service.
- I tried to separate domain layer from infrastructure code, testing entities and services must be easy with mocked services. That's whe amount of code is more than not DDD solution.
- creditors and debtors doesn't have roles, because any company (in my opinion) can issue invoice to another company. Otherwise, restrictions must be added.
- you can find some descriptions in code

# Next steps

0. Composer install
1. Up the background service, add it to supervisor or another visor.
2. Done.

Service can work from php default server *, just run from public folder `php -S localhost:8080`


* But it doesn't, except company adding route. I am lack of time to test service.
