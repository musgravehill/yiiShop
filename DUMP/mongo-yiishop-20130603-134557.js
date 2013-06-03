
/** comment indexes **/
db.getCollection("comment").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** comment records **/
db.getCollection("comment").insert({
  "_id": ObjectId("50ee968858da872008000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": NumberInt(4),
  "title": "Довольный слон",
  "description": "нормальная лампа, светит ярко и тепло.",
  "datePublished": "2013-01-10 14:23:04"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50eeb6fa58da873808000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": NumberInt(1),
  "title": "переплатил рыжему",
  "description": "НЕ Энергосберегающая вовсе!! Кране не советую! Сгорает быстро! Вольфрам в нити безумно вреден! Спектр сплошной - после линейчатого привыкать приходится.",
  "datePublished": "2013-01-10 16:41:30"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50eebc6b58da872c08000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": NumberInt(5),
  "title": "светит!!! и греет",
  "description": "Отличная лампа! Советую.",
  "datePublished": "2013-01-10 17:04:43"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50eebc9e58da872c08000001"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": NumberInt(3),
  "title": "терпимо",
  "description": "ничо так лампа",
  "datePublished": "2013-01-10 17:05:34"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50eebe6858da873008000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(2),
  "author": "adminName",
  "ratingValue": NumberInt(5),
  "title": "в полете",
  "description": "ВЕЩЬ!!! А++",
  "datePublished": "2013-01-10 17:13:12"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f0070058da87ec07000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(1),
  "author": "adminName",
  "ratingValue": 5,
  "title": "счастлив аки слонопотам",
  "description": "100МГЦ 2 канала за 19тыс! ВЕЩЬ",
  "datePublished": "2013-01-11 15:35:12"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f0071958da87ec07000001"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(1),
  "author": "adminName",
  "ratingValue": 4,
  "title": "тектроникс лучше",
  "description": "но стоит дороже",
  "datePublished": "2013-01-11 15:35:37"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3b6e358da873408000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": 5,
  "title": "линейный спектр",
  "description": "как солнечный свет, для глаз полезно",
  "datePublished": "2013-01-14 10:42:27"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3b75d58da873808000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": 4,
  "title": "спектр",
  "description": "но много потребляет",
  "datePublished": "2013-01-14 10:44:29"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3b7de58da872c08000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": 5,
  "title": "класс",
  "description": "",
  "datePublished": "2013-01-14 10:46:38"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3c8c158da87b00a000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": 5,
  "title": "AAAA++++",
  "description": "",
  "datePublished": "2013-01-14 11:58:41"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3d91058da876010000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": 5,
  "title": "Nr bbas",
  "description": "",
  "datePublished": "2013-01-14 13:08:16"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3ecc258da876010000001"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(5),
  "author": "adminName",
  "ratingValue": 5,
  "title": "СУПЕР!!!",
  "description": "А++++",
  "datePublished": "2013-01-14 14:32:18"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3f02558da87700b000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(6),
  "author": "adminName",
  "ratingValue": 5,
  "title": "ffd",
  "description": "fsdfsd",
  "datePublished": "2013-01-14 14:46:45"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3f03058da87b00a000001"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(6),
  "author": "adminName",
  "ratingValue": 5,
  "title": "1111",
  "description": "12212121",
  "datePublished": "2013-01-14 14:46:56"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3f06958da87b817000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": 5,
  "title": "bg",
  "description": "fddfds",
  "datePublished": "2013-01-14 14:47:53"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3f7a058da872814000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(6),
  "author": "adminName",
  "ratingValue": 5,
  "title": "3333",
  "description": "16.18",
  "datePublished": "2013-01-14 16:18:40"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3fc8758da872814000001"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": 5,
  "title": "16:39",
  "description": "vcxvc",
  "datePublished": "2013-01-14 16:39:35"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3fca558da87b817000001"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(1),
  "author": "adminName",
  "ratingValue": 5,
  "title": "super",
  "description": "A++",
  "datePublished": "2013-01-14 16:40:05"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f3fcef58da87b817000002"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(3),
  "author": "adminName",
  "ratingValue": 5,
  "title": "16-41",
  "description": "",
  "datePublished": "2013-01-14 16:41:19"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f400e458da871014000000"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(4),
  "author": "adminName",
  "ratingValue": 5,
  "title": "зажигай@01 вызывай",
  "description": "",
  "datePublished": "2013-01-14 16:58:12"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f4015c58da871014000001"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(4),
  "author": "adminName",
  "ratingValue": 5,
  "title": "жги@туши",
  "description": "",
  "datePublished": "2013-01-14 17:00:12"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f4017558da87700b000001"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(2),
  "author": "adminName",
  "ratingValue": 5,
  "title": "лети@коси",
  "description": "",
  "datePublished": "2013-01-14 17:00:37"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f4018858da87b817000003"),
  "user_id": NumberInt(1),
  "product_id": NumberInt(4),
  "author": "adminName",
  "ratingValue": 5,
  "title": "жги@беги",
  "description": "",
  "datePublished": "2013-01-14 17:00:56"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f4033d58da87b00a000002"),
  "user_id": NumberInt(53),
  "product_id": NumberInt(4),
  "author": "Борис",
  "ratingValue": 5,
  "title": "A++",
  "description": "real thing",
  "datePublished": "2013-01-14 17:08:13"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f54fd958da872008000000"),
  "user_id": NumberInt(53),
  "product_id": NumberInt(4),
  "author": "Boris",
  "ratingValue": 5,
  "title": "16-47",
  "description": "tuesday match",
  "datePublished": "2013-01-15 16:47:21"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f5507c58da871808000000"),
  "user_id": NumberInt(53),
  "product_id": NumberInt(4),
  "author": "Boris",
  "ratingValue": 4,
  "title": "промокают",
  "description": "не горят под водой",
  "datePublished": "2013-01-15 16:50:04"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f5509758da871808000001"),
  "user_id": NumberInt(53),
  "product_id": NumberInt(4),
  "author": "Boris",
  "ratingValue": 4,
  "title": "промокают",
  "description": "",
  "datePublished": "2013-01-15 16:50:31"
});
db.getCollection("comment").insert({
  "_id": ObjectId("50f5531a58da871408000000"),
  "user_id": NumberInt(53),
  "product_id": NumberInt(4),
  "author": "Boris",
  "ratingValue": 5,
  "title": "горят даже под слоем бензина!",
  "description": "офыигеть!",
  "datePublished": "2013-01-15 17:01:14"
});
