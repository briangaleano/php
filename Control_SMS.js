const express = require("express");
const bodyParser = require('body-parser');
const http = require('http');
var admin = require("firebase-admin");
const axios = require('axios');
const app = express();
var FormData = require('form-data');
const fetch = require('node-fetch');
var jQuery = require("jquery");


let date_ob = new Date();
// current date
// adjust 0 before single digit date
let day = ("0" + date_ob.getDate()).slice(-2);
// current month
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
let month = ("0" + (date_ob.getMonth() + 1)).slice(-2);
// current year
let year = date_ob.getFullYear();
// current hours
let hours = date_ob.getHours();
// current minutes
let minutes = date_ob.getMinutes();
// current seconds
let seconds = date_ob.getSeconds();

var serviceAccount = {
  "type": "service_account",
  "project_id": "muttelpet-e168e",
  "private_key_id": "04c16c7a85355748e3aca845c373028e0d4f3eaa",
  "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDMaB+QwIFn7sKn\nFrek7v+QVG3NlIc5ktYIrAMTY2gizrUYCInK4UIoQTLgpGQHyEuZcWdfLKmnssat\nrlEVrrfcs59ykuLVEYBURndYhrpCxHMJnAKbCzw6T/aVgK85BVq6cqWLqzvZg+A/\nOyGTjlFURygXTW5MLWZk9GgzVWszKty5uORp4wh346QoRR6KoOb96ypjPU0xaset\nveYcDen1CcIhlI8xZv/5bRaNPoZedT8wEvbCkl45l2K+t89ounRanPR0hkVVUhIc\njVT36bnZlzin9Juz1AlCbSZrrBN4g9VZWevdhAFgCarxFqjxOlXpcUGZ0mKazMt1\n7m1fPPXxAgMBAAECggEAXWehMPi+yXsByO+pGH28G7xw9pXOGyF9m7Xaq/PrZKh3\neVWBfctke1ebw6prKWE+Jo57MbMLjZ20iy4SUGmoC/qqvGThsYKPVTNkGvhpydPS\nS4xWZnoCWhUrNVL5/wDy3itAeavULAfGo65GIBLTGENxzwArjDTcyvoiWX7JfzXf\n3zvYJs6mWW3xYIts2LlOUDF6Gt01MwyAWkrkq3m9GZ0tJpI1naF63/ZGjbzKMUCm\njjNJq13F1n7ztaX99mh8TC+YdQ37eBXUTz4Qo1j2o0wiEnL+QgyN5XXDuUS8/ed/\nhsPDeok44Chnx+zDqyKflTliRxQSd58UR8lMhGEm9wKBgQD0xbEdUdCpZ/vQSNo5\nHxQlKluxrHLn6hj64rN6U9xP5RGETxRMeUC1j7g4ZjAekNOLgm/fTZb2z/5EmlQG\nDrMDs73jw0GeMmFW6bIG05l7FM40JC8yJFA4wxNmzQboHkGzk8b7lla9Oic4VC5l\n1x1d56W5/8LEQdfkRS8nIeBziwKBgQDVyG2PFq4aUOrIYBjBra2Zb4wVeD6Ntbb5\nYOYS8eszojufA6V3KQMJl3ogyDkMmv0WyvAMeslty7eblU1uiixp9zJAbvJe/zKI\nWlEQMohdZ06s8xhSCiRKwUlVj42yoeJye4WcFm2v2DzukaLOctZxiP2oKIYcPaYT\naomHVnL78wKBgEzEO7ogULrwu88lKhvEHYNSd5OPrDID/3Wf5/4zkuMTypyeWJVr\nadoHixVVJz5O2anlbMSyBui9bteBN1z2+znsA2ANeuTslA64GHd/oaEyc0FzH8Iw\nFWDX/Zu+La5a3uw9Kqj5C5cpR+eoryyNfM5YumdNSX5X0Cftcs5pF4XlAoGABtV8\nYxmXgTHa/4LK584UgZYmRT1tynvnmHs3f52KJkFmZIPqUy/VcAYOmmOsJzIBKyxb\nlhqKu97KRMf2DLWQC+ciDRs+1jiUNfWlJ75ly46U3kR7H4xBcr5RCNIo9m/kXEKE\nl+PDp95ivEGdkbnsDv8RFMIO33I9D9vU/6WM0W8CgYEAjEvhZSguoP/1O0TTIS3O\nIkGpPHqgdJQZG88E58mXbpY2Fg+MfnUPEhP0U50M7136XDOwmd7Q66sj/w8luyhd\nGpQfrxC00ZTwu80Zmd6gs+iuLfX8jlIkWagVaWwcFI8oFT0vLnb5EkokKFpZVnQU\ndTqY77IDycp3Ov1Ca0iy1c8=\n-----END PRIVATE KEY-----\n",
  "client_email": "firebase-adminsdk-mhlne@muttelpet-e168e.iam.gserviceaccount.com",
  "client_id": "103249499923875251662",
  "auth_uri": "https://accounts.google.com/o/oauth2/auth",
  "token_uri": "https://oauth2.googleapis.com/token",
  "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
  "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-mhlne%40muttelpet-e168e.iam.gserviceaccount.com"
};

admin.initializeApp({
    credential: admin.credential.cert(serviceAccount),
    databaseURL: "https://muttelpet-e168e.firebaseio.com"
  });

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.listen(3000, () => {
  console.log("El servidor está inicializado en el puerto 3000");
});

app.get('/', function (req, res) {
  res.send('Hello World!');
});

app.post("/brand_reply_add_chat", function (req, res) {
  var data_form = new FormData();
  var from = req.body.From;
  var to = req.body.To;
  var body = req.body.Body;
  
  fetch('https://mt.dev2.facadeinteractive.com/wp-admin/admin-ajax.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
    },
    body: 'action=Brand_Reply_in_sms&From='+from+'&To='+to+'&Body='+body,
  })
  .then(function (response) {
      if (response.status >= 400) throw new Error("Bad response from server")
      if (response.status == 200)
        return response.json()
    })
    .then(function (data) {
      console.log('data = ', data);
      
      var db = admin.database();
      var postsRef = db.ref(data.id_chat);
      postsRef.push({
        user_id: data.id_brand,
        message: data.sms,
        date: data.date,
        hour: data.hour,
        type: 'sms',
      });
    })
    .catch(function (err) {
      console.error(err);
    });
     
});

app.post("/Influencer_reply_add_chat", function (req, res) {
  var data_form = new FormData();
  var from = req.body.From;
  var to = req.body.To;
  var body = req.body.Body;

  fetch('https://mt.dev2.facadeinteractive.com/wp-admin/admin-ajax.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
    },
    body: 'action=Influencer_Reply_in_sms&From=' + from + '&To=' + to + '&Body=' + body,
  })
    .then(function (response) {
      if (response.status >= 400) throw new Error("Bad response from server")
      if (response.status == 200)
        return response.json()
    })
    .then(function (data) {
      console.log('data = ', data);

      var db = admin.database();
      var postsRef = db.ref(data.id_chat);
      postsRef.push({
        user_id: data.id_influencer,
        message: data.sms,
        date: data.date,
        hour: data.hour,
        type: 'sms',
      });
    })
    .catch(function (err) {
      console.error(err);
    });
});

app.post("/assignment-expired", function (req, res) {
  var data_form = new FormData();
  var id_chat = req.body.id_chat;
  var idinfluencer = req.body.id_influencer;
  var idbrand = req.body.id_brand;
  var idpet = req.body.id_pet;
  var idassignment = req.body.id_assignment;
  var date = req.body.date;
  var hour = req.body.hour;

  var db = admin.database();
  var postsRef = db.ref(id_chat);
  postsRef.push({
    user_id: idbrand,
    message: '<img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/Group-7672.png" alt="time">Assignment expired because the influencer did not respond in time.<a class="resend-assigment" id_resend="' + idpet + '" id_assigment_change="' + idassignment +'">Resend assignment?</a>',
    date: date ,
    hour: hour,
    type: 'automated_message',
  });
  res.send(' Done ');
});

app.post("/assignment-complete", function (req, res) {
  var data_form = new FormData();
  var id_chat = req.body.id_chat;
  var idinfluencer = req.body.id_influencer;
  var idbrand = req.body.id_brand;
  var idpet = req.body.id_pet;
  var idassignment = req.body.id_assignment;
  var url = req.body.url;
  var date = req.body.date;
  var hour = req.body.hour;

  var db = admin.database();
  var postsRef = db.ref(id_chat);
  postsRef.push({
    user_id: idinfluencer,
    message: '<img class="img_icon_complete" src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2020/07/Group-9117.png" alt="time"><p class="title_complete_chat">Assignment Completed</p><p class="descrip_complete_chat">View completed assignments from you Profile.</p><img class="img_complete_chat" src="' + url +'">',
    date: date,
    hour: hour,
    type: 'complete_assignment',
  });
  res.send(' Done ');
});

app.post("/assignment-countered-influencer", function (req, res) {
  var data_form = new FormData();
  var id_chat = req.body.id_chat;
  var idinfluencer = req.body.id_influencer;
  var idbrand = req.body.id_brand;
  var idpet = req.body.id_pet;
  var idassignment = req.body.id_assignment;
  var date = req.body.date;
  var hour = req.body.hour;
  var name_pet = req.body.name_pet;
  var new_value = req.body.val_counter;
  var original = req.body.original;

  var db = admin.database();
  var postsRef = db.ref(id_chat);
  postsRef.push({
    user_id: idinfluencer,
    message: '<img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/Group-9582.png" alt="Accepted"><strong>' + name_pet + '</strong> submitted a counter value (<strong>$ ' + new_value + '</strong>).<a class= "review-counter-offer" new_value_counter="' + new_value + '" name_pet="' + name_pet + '" original_value_counter="' + original + '" id_assigment="' + idassignment + '" > Review Now</a>',
    date: date,
    hour: hour,
    type: 'automated_message',
  });
  res.send(' Done ');
});


app.post("/assignment-countered-accepted", function (req, res) {
  var data_form = new FormData();
  var id_chat = req.body.id_chat;
  var idinfluencer = req.body.id_influencer;
  var idbrand = req.body.id_brand;
  var idpet = req.body.id_pet;
  var idassignment = req.body.id_assignment;
  var date = req.body.date;
  var hour = req.body.hour;
  var name_brand = req.body.name_brand;
  var val_counter = req.body.val_counter;
  var original = req.body.original;

  var db = admin.database();
  var postsRef = db.ref(id_chat);
  postsRef.push({
    user_id: idbrand,
    message: "<img src='https://mt.dev2.facadeinteractive.com/wp-content/uploads/2019/10/Group-7671.png' alt='Accepted'><p><strong>" + name_brand + "</strong> accepted the counter value<strong>($ " + val_counter + ")</strong >.<a class='what-is-next influencer' name_brand='" + name_brand+"' > What's Next?</a>",
    date: date,
    hour: hour,
    type: 'automated_message',
  });
  res.send(' Done ');
});

app.post("/assignment-countered-decline", function (req, res) {
  var data_form = new FormData();
  var id_chat = req.body.id_chat;
  var idinfluencer = req.body.id_influencer;
  var idbrand = req.body.id_brand;
  var idpet = req.body.id_pet;
  var idassignment = req.body.id_assignment;
  var date = req.body.date;
  var hour = req.body.hour;
  var name_brand = req.body.name_brand;
  var val_counter = req.body.val_counter;
  var original = req.body.original;
  var name_pet = req.body.name_pet;

  var db = admin.database();
  var postsRef = db.ref(id_chat);
  postsRef.push({
    user_id: idbrand,
    message: '<img src="https://mt.dev2.facadeinteractive.com/wp-content/uploads/2020/03/time.png" alt="Accepted"><p>The counter value (<strong>$ ' + val_counter + '</strong>) was not accepted.<strong>' + name_pet + '</strong> has <strong> 24 hours</strong> if you wish to reconsider the original value(<strong> $' + original +'</strong>).After, the assignment will close.</p>',
    date: date,
    hour: hour,
    type: 'automated_message',
  });
  res.send(' Done ');
});

