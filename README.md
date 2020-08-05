# Outdoorsy Backend Coding Challenge

The first interesting part of the task was that one specific route can accept many different GET params and return a huge set of diverse information. There was no condition in the task , that says developer must be able to combine all these parameters, but now this may seem to me the most challenging thing - to find a way to be able to combine every GET param. 

The second interesting thing was finding the best way to handle this route - `campervans?near=33.64,-117.93`. In the beginning I wrote all of the logic to be handled by single Helper object with method inside him and it was working fine. But then after I made some extra research I find a way to handle all of this in the database query. So I moved the logic from PHP to the Postgresql.

Sentry and Datadog were something totally new for me and I found this kind of tools great, because they can be very useful in a huge app for monitoring the performance.
 
 Maybe interesting component of the task was to be able to configure my own VM to work with postgres too. I used for local env VM builded with VAGRANT and configurated with Ansible, but it was set to work only with MySQL and MongoDB.

 Another thing I encountered for first time was heroku. The deployment of the project  took me a lot of time, maybe almost the same as configurating the VM for Postgres...

There was no condition in the the READ.ME file to be able to combine the parameters and I decided to write some example routes. What remains that cannot be combined is the route campervans?ids=2000,51155,54318. After I spoke with member of our team, we came to the conclusion, that if someone will ask for a request only for specific ids, he already knows what he wants to get and it is unnecessary to offer additional sorting. 

In the task there is also an option to sort by price. I added the feature to sort the records by id,created and updated field too. You can find all the example routes below.

## Functionality


- `campervans`
- `campervans?price[min]=9000&price[max]=75000`
- `campervans?page[limit]=3&page[offset]=6`
- `campervans?ids=2000,51155,54318`
- `campervans?near=33.64,-117.93` // within 100 miles
- `campervans?sort=price`
- `campervans/<CAMPER_VAN_ID>`
- `campervans?price[min]=9000&price[max]=75000&page[limit]=3&page[offset]=6&sort=price`
- `campervans?sort=id`
- `campervans?sort=created`
- `campervans?sort=updated`
- `campervans?near=33.64,-117.93&price[min]=9000&price[max]=75000&page[limit]=3&page[offset]=6&sort=updated`
- `campervans?price[min]=20000&sort=created`
- `campervans?near=33.64,-117.93&price[min]=9000&&sort=updated`

**Link to the heroku server -> https://blooming-depths-53374.herokuapp.com/**

**_Ivan Avramov - Junior Backend Developer - Softavail_**
