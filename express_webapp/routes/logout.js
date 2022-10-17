const express = require("express");
const router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

var sess;

router.get("/", function (req, res, next) {
  sess = req.session;
  sess.destroy();

  res.redirect("/login");
});

router.post("/", function (req, res, next) {
  sess = req.session;

  user_dao.delete([sess.user.email], function (err) {
    if (err) {
      throw err;
    }

    sess.destroy();
    res.redirect("/login");
  });
});

module.exports = router;
