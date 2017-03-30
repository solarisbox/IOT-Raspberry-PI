# METHOD DESCRIPTIONS
  | REQUEST TYPE | METHOD | DESCRIPTION|
  |:------------:|:-------|:-----------|
  | POST | login  | login the user under POST['user'] and POST['pass'].
  | POST | logout | log out the currently logged in user.
  | POST | signup | attempt to create the user POST['user'] and POST['pass'].

# SESSION VARIABLES
  * user
    * username  - the logged in users username
    * userId    - the logged in users userId
    * logged    - true / false if a user is logged in.

  * registration
    * success - true / false if the new user has been registered
    * error   - if success is false, an error message is provided
