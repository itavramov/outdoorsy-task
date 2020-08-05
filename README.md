# Outdoorsy Backend Coding Challenge

Thanks for applying for a backend role at Outdoorsy. We've put together this code challenge, which should take around 4-6 hours to complete.

## Functionality
The task is to develop a campervan JSON API that returns a list of campervans that can be filtered, sorted, and paginated. We have included files to create a database of campervans and campervan images. There is a GOlang project in this repo ready to go, or you can use whatever backend technology you are comfortable with. Finish by pushing your code to Github and deploying both the API to Heroku or another hosting environment.

Your application should respond to the following URLs.

- `campervans`
- `campervans?price[min]=9000&price[max]=75000`
- `campervans?page[limit]=3&page[offset]=6`
- `campervans?ids=2000,51155,54318`
- `campervans?near=33.64,-117.93` // within 100 miles
- `campervans?sort=price`
- `campervans/<CAMPER_VAN_ID>`


## What we are looking for
1. All functionality implemented and working correctly
2. Add tests
3. Proper architecture of the codebase
	a. Decoupled components providing behaviors
	b. Components composed to aggregate behaviors
	c. Clean, maintainable code with appropriate comments
4. Well formed SQL
	a. Optimized, efficient queries
	b. Proper indexing
	c. Minimal queries for only the data you need
	d. Well formatted and maintainable
5. Proper error handling
	a. Surfacing errors to the user in a useful way
	b. Automatic retries on the backend where applicable (SQL Faults, etc)
6. Error reporting using Sentry
7. Tracing using OpenTracing/Datadog
8. Optimized code
	a. Minimal allocations
	b. Proper data structures to minimize execution time
	c. Efficient algorithms to minimize execution time

### Notes
- Please make frequent, and descriptive git commits.
- Use third-party libraries or not; your choice.
- The functionality of the project matches the description above
- An ability to think through all potential states


Thank you, and please reach out if you have any questions!
