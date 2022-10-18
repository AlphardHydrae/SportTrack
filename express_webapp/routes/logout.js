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
      console.log("The account could not be deleted");
      res.redirect("/homepage");
      // throw err;
    } else {
      sess.destroy();
      console.log("The account has been deleted successfully");
      res.redirect("/login");
    }
  });
});

module.exports = router;
