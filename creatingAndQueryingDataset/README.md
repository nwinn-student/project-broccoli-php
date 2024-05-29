# Creating and Querying a Dataset

## Extra Information

Creates/overrides a database called <code>userinformation</code>, with 3 tables, <code>user</code>, <code>stats</code>, and <code>user-stats</code>, which are populated with random numbers.  

| Title | Description |
| :--- | :--- |
| <code>user</code> | Contains two columns, <code>user_id : int(11), auto-increments - the key for indexing the user cell</code> and <code>username : varchar(100) - the username associated with the user_id</code>. |
| <code>stats</code> | Contains  six columns, <code>stats_id : int(11), auto-increments - the key for indexing the stats cell</code>, <code>level : int(11) - the level associated with the stats_id</code>, <code>base_health : int(11) - the health value when not accounting for equipments or stats, only the level</code>, <code>health : int(11) - the health value after accounting for any formula or function that can impact it</code>, <code>experience : int(11) - the current experience held</code>, and <code>required_experience : int(11) - the required experience to level up</code>. |
| <code>user_stats</code> | Contains two columns, <code>user_id</code>, which is a foreign key sourced from <code>user</code> and <code>stats_id</code>, which is a foreign key sourced from <code>stats</code>.  Connects a user and stats id so that they can be referenced. |

The database is then queried multiple times and a derived column is appended to <code>stats</code>.

The queries are as follows:
1. Write a query to find the usernames of individuals with a higher level than 350, usernames should be listed only once.  They should then be sorted by level.
2. Write a query to find the username, level, and health of all users.
3. Write a query to produce the average level, health, and experience of all users.
4. Write a query that finds the username and experience for users that are in between levels 50 and 100.

The derived columns are <code>delta_health</code> and <code>delta_experience</code>, both of which represent the change between two other columns.