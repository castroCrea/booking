Feature: Manage rooms and their bookings
  In order to manage rooms and their bookings
  As a client software developer
  I need to be able to retrieve, create, update and delete them through the API.

  # the "@createSchema" annotation provided by API Platform creates a temporary SQLite database for testing the API
  @createSchema
  Scenario: Create a rooms
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "/api/rooms" with body:
    """
    {
      "number": 2,
      "floor": 1,
      "availableSleeps": 2,
      "price": 25.3,
      "comment": "2 windows"
    }
    """
    Then the response status code should be 201
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/ld+json; charset=utf-8"
    And the JSON should be equal to:
    """
    {
        "@context": "\/api\/contexts\/Rooms",
        "@id": "\/api\/rooms\/1",
        "@type": "Rooms",
        "id": 1,
        "number": 2,
        "floor": 1,
        "availableSleeps": 2,
        "price": 25.3,
        "comment": "2 windows",
        "bookings": []
    }
    """

    Then I add "Content-Type" header equal to "application/ld+json"
    When I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "/api/bookings" with body:
    """
    {
      "room": "/api/rooms/1",
      "arrivalDate": "2030-03-07T00:00:00Z",
      "departureDate": "2030-03-10T00:00:00Z",
      "breakfast": true,
      "numberOfPax": 2
    }
    """
    Then the response status code should be 201
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/ld+json; charset=utf-8"
    And the JSON should be equal to:
    """
    {
      "@context": "\/api\/contexts\/Bookings",
      "@id": "\/api\/bookings\/1",
      "@type": "Bookings",
      "id": 1,
      "room": "\/api\/rooms\/1",
      "arrivalDate": "2030-03-07T00:00:00+00:00",
      "departureDate": "2030-03-10T00:00:00+00:00",
      "breakfast": true,
      "numberOfPax": 2

    }
    """

    Then I add "Content-Type" header equal to "application/ld+json"
    When I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "/api/bookings" with body:
    """
    {
      "room": "/api/rooms/1",
      "arrivalDate": "2030-03-07T00:00:00Z",
      "departureDate": "2030-03-10T00:00:00Z",
      "breakfast": true,
      "numberOfPax": 2
    }
    """
    Then the response status code should be 400
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/ld+json; charset=utf-8"
    And the JSON should be equal to:
    """
    {
      "@context": "/api/contexts/ConstraintViolationList",
      "@type": "ConstraintViolationList",
      "hydra:title": "An error occurred",
      "hydra:description": "arrivalDate: The Rooms is not avalable at this date",
      "violations": [
        {
          "propertyPath": "arrivalDate",
          "message": "The Rooms is not avalable at this date"
        }
      ]
    }
    """

    Then I add "Content-Type" header equal to "application/ld+json"
    When I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "/api/bookings" with body:
    """
    {
      "room": "/api/rooms/1",
      "arrivalDate": "2030-03-09T00:00:00Z",
      "departureDate": "2030-03-10T00:00:00Z",
      "breakfast": true,
      "numberOfPax": 2
    }
    """
    Then the response status code should be 400
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/ld+json; charset=utf-8"
    And the JSON should be equal to:
    """
    {
      "@context": "/api/contexts/ConstraintViolationList",
      "@type": "ConstraintViolationList",
      "hydra:title": "An error occurred",
      "hydra:description": "arrivalDate: The Rooms is not avalable at this date",
      "violations": [
        {
          "propertyPath": "arrivalDate",
          "message": "The Rooms is not avalable at this date"
        }
      ]
    }
    """

    Then I add "Content-Type" header equal to "application/ld+json"
    When I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "/api/bookings" with body:
    """
    {
      "room": "/api/rooms/1",
      "arrivalDate": "2030-03-10T00:00:00Z",
      "departureDate": "2030-03-11T00:00:00Z",
      "breakfast": true,
      "numberOfPax": 2
    }
    """
    Then the response status code should be 201
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/ld+json; charset=utf-8"
    And the JSON should be equal to:
    """
    {
      "@context": "\/api\/contexts\/Bookings",
      "@id": "\/api\/bookings\/2",
      "@type": "Bookings",
      "id": 2,
      "room": "\/api\/rooms\/1",
      "arrivalDate": "2030-03-10T00:00:00+00:00",
      "departureDate": "2030-03-11T00:00:00+00:00",
      "breakfast": true,
      "numberOfPax": 2

    }
    """
    # The "@dropSchema" annotation must be added on the last scenario of the feature file to drop the temporary SQLite database
    @dropSchema