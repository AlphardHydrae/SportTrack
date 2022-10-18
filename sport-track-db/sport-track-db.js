const db_connection = require("./sqlite_connection");
const user_dao = require("./user_dao");
const activity_dao = require("./activity_dao");
const activity_entry_dao = require("./activity_entry_dao");
module.exports = {
  db: db_connection,
  user: user_dao,
  activity: activity_dao,
  activity_entry: activity_entry_dao,
};
