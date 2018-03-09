#Test Of the Api

##Techno used

* Behat (It is php framework for autotesting)
* Whe do senario and the features file with the extension .feature
* You can also boostrap (Set a context) of you auto test
* Also you can create senario sentence in you Senario that you set in the contextfile
* Api -platform comes with some context directly set
* We used test database

## My process

* First we set all the table booking_test with the same entity than the prod
* The database test option are set in the confid/packages/test/doctrine.yaml
* The the senario is reun
* The we drop all test database at the end of the senario

## Senario rooms.features

* First create the room
* Create a booking
* Try to reset the same booking (and looking for validation error)
* Try to set a booking during the date of the previous booking (and looking for the validation error)
* Try to set a booking when arrival date egal departure date than the booking before (See if it validated)


## TODO Test

* Date past
* Date departure before arrival
* To many pax