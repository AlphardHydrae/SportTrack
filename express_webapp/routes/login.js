const express = require("express");
const router = express.Router();
const user_dao =
  require("/Users/alphardhydrae/Documents/GitHub/SportTrack/sport-track-db/sport-track-db").user;

router.get("/", function (req, res) {
  res.render("login", {});
});

router.post("/login", (req, res) => {
  let result = {};

  user_dao.findAll((err, rows) => {
    if (err) {
      throw err;
    }

    result = rows;
  });

  let i = 0;
  let found = false;

  while (i < result.length && !found) {
    let user = result[i];

    if (user.email == req.body.email && user.mdp == req.body.pwd) {
      found = true;
    }

    i++;
  }

  let page = "";
  let arr = {};

  if (found) {
    page = "homepage";
    arr = {
      lastname: user.nom,
      firstname: user.prenom,
      dob: user.dateDeNaissance,
      gender: user.sexe,
      height: user.taille,
      weight: user.poids,
      email: user.email,
      pwd: user.mdp,
    };
  } else {
    page = "login";
    arr = {
      incorrect: "le nom d'utilisateur ou le mot de passe est incorrect",
    };
  }

  res.render(page, arr);
});

module.exports = router;
