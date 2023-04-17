import json

data = '''
  {
    "rows": [
        {
            "id": 6,
            "url": "http:\/\/localhost\/tsugicloudphp\/\/about\/documentation\/faq\/",
            "title": "Tsugicloud PHP",
            "body": " Tsugicloud PHP FAQ a.How would a teacher use TsugiCloud? Most Learning Management Systems (LMS) support the IMS Learning Tools Interoperability\u00c2\u00ae (LTI) specification. To integrate a tool, you need  ...",
            "words": " 100 12345secret able accepted added administrator affialiate agreements ahow aka all allow andor apereo app apply apps area associated away bad blackboard brightspace build built called campus canvas ccan classroom classrooms cleared code commercial commonly connect content continue contrib contributor convienently data dcan deep details developing donate done ecan educational effort eligible experiences exposes faq framework free get google grades host hosting hosts immediately ims install integrate intellectual interoperability into item items join key keysecret known launch learning license licensing like linking lms lmss look lti management member moodle most move need never once only open organization own part passed pay perfect periodically php place please plug point possible production project property public purchase receive review rigor sakai secret select send service settings should site source specification staff stage started store stored students submit support supports systems systemwide teacher test testing that the them these this those thrown tool tools tsugi tsugicloud tsugicloudorg under url urls use users using very visit want web written ",
            "hash": "b067965ebe2c1414467ddd7f3b9e40ee",
            "code": null,
            "retrieved_date": 1681647528
        }
    ]
}'''

info = json.loads(data)


for item in (info["rows"]) :
  print(item["title"])
  print(item["url"])
  print(item["body"])
  
