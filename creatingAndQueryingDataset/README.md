### Project creatingAndQueryingDataset

## Extra Information

Creates/overrides a database called <code>userinformation</code>, with 3 tables, <code>user</code>, <code>stats</code>, and <code>user-stats</code>, which are populated with random numbers.  

| Title | Description |
| :--- | :--- |
| <code>user</code> | Contains two columns, <code>user_id : int(11), auto-increments,</code> and <code>username : varchar(100)</code> |
| <code>stats</code> | Contains  six columns, <code>stats_id : int(11), auto-increments,</code>, <code>level : int(11)</code>, <code>base_health : int(11)</code>, <code>health : int(11)</code>, <code>experience : int(11)</code>, and <code>required_experience : int(11)</code>|

The database is then queried multiple times and a derived column is appended to <code>stats</code>. 
