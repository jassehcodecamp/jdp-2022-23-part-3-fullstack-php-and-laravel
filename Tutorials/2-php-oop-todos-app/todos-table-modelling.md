Todos Table:

id: Integer, Unsigned, Unique, Primary Key
description: String (Varchar: 255), Cannot be null
completed: Boolean, default is false
created_at: timestamp, nullable, default is current_timestamp
updated_at: timestamp, nullabe, default is current_timestamp, on update current_timestamp
deleted_at: timestamp, nullabe, default is current_timestamp