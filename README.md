# Introduction
The aim of this exercise is to assess your approach to solving problems with
non-trivial business logic.

It is also an opportunity to show off any of your skills that you consider relevant.
You can spend as much time as you want on the task, but we recommend that
you read it thoroughly, think about it for a couple of days, and then dedicate
one afternoon to it.  

We need to see enough of your code to assess your knowledge on key aspects
of engineering and the standards of your code when it comes to **Runability**,
**Testability** & **API Design**.

But, we don’t need to see a complete solution. Please, write a brief, separate
document about the next steps you would’ve taken if you would’ve continued
to develop the solution.

## Challenge

- An invoice is a document issued by a seller (creditor) to the buyer (debtor). It provides details
about a sale or services, including the quantities, costs.
- Factoring is a process where a company (creditor) sells its invoice to a third-party factoring
company (Billie). The factoring company then takes care of collecting the money from the debtor.
- Since there is always the risk that a debtor won't pay their invoices, Billie sets a debtor limit for
each company. This means that Billie won't accept the invoice if the debtor's total amount of open
invoices reaches the limit.

## THE BUSINESS

- Create a web service for Billie that allows adding companies, adding invoices and marking an
invoice as paid.
- The code should be easy to run and should include simple documentation to describe the
solution.
- The web service is created using PHP 7 or 8.
- We will look closely at API design and testability.

## Delivery
- Use the unzipped folder the file came in (“Billie_Backend_Coding_Challenge”) as a Git
repository. Please commit your code to it.
- Separate the framework initialization code from your own code in different commits.
- Once you are done, compress again the whole folder (including the `.git` folder) into a zip file.
- Follow the link provided in the email to submit the zip for our engineers to review.
- Please provide a statement about what the next steps would’ve been. Include it as a text file in
the root directory called “next_steps”


### Secret technologies

**POSITIVE**
- application completely decoupled from framework-libraries
- PSR are followed and respected completely
- clean and understandable application
- implementation of design patterns
- used some very cool libraries and technologies that we could use in Billie (like SWOOLE for example), also laminas
- understands clearly how DDD works
- nice test coverage and the usage of in memory repository is a big plus, this means that doesn't overuse or abuse mocks
- application nicely architected and very easy

**NEGATIVE**
- No domain model. Anaemic (models) entities in infra layer. One controller for everything and only 3 simple operations covered. SOLID violations everywhere…
- Anemic domain model
- Mixing App/Domain with Infra/Framework concerns
- Not built in an API way.
- Endpoints are not named in restful way.
- Many SOLID violations, like SID...
- Basically no logic in the entire code, except in a one place and that was implemented with mistakes.
- No domain logic
- No layers in the application
- No tests at
