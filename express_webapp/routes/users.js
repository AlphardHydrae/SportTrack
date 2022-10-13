var express = require('express');
var router = express.Router();
var user_dao = require('../../../../../sport-track-db/sport-track-db').user;

router.get('/', function(req, res, next) {
  user_dao.findAll(function(err, rows) {
    if(err){
      console.log("ERROR= " + err);
    } else {
      res.render('users', rows);
    }
  });
});

module.exports = router;