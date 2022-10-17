const express = require("express");
const router = express.Router();
const user_dao = require("../../sport-track-db/sport-track-db").user;

var sess;

router.get("/", function (req, res, next) {
  res.render("login", {});
});

router.post("/", function (req, res, next) {
  sess = req.session;

  user_dao.findByKey([req.body.email], (err, rows) => {
    if (err) {
      console.log(err);
      res.redirect("/login_false");
      // throw err;
    }

    if (rows != null) {
      let user = rows;

      if (user.mdp == req.body.pwd) {
        sess.user = user;

        console.log("Login successful");
        res.redirect("/homepage");
      } else {
        console.log("Login failed");
        res.redirect("/login_false");
      }
    } else {
      console.log("Login failed");
      res.redirect("/login_false");
    }
  });
});

module.exports = router;
