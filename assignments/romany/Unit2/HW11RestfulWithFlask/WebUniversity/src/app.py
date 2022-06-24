
from email import message
import mimetypes
from urllib import response

from flask import Flask,request,jsonify, Response
from flask_pymongo import PyMongo
from pymongo import MongoClient
from bson import json_util
from bson.objectid import ObjectId

# app.config['MONGO_URI']='mongodb+srv://Yulliana:1234Yul@cluster0.2f5ph.mongodb.net/University?retryWrites=true&w=majority'


app=Flask(__name__)
app.config['MONGO_URI']='mongodb://localhost:27017/Univesity'
mongo=PyMongo(app)

@app.route('/instructor', methods=['POST'])
def add():
    id=request.json['id']
    name=request.json['name']
    salary=request.json['salary']
    tc=request.json['tc']
    
    if id and name and salary and tc:
        id_data=mongo.db.instructors.insert_one(
            {'id':id, 'name':name, 'salary':salary, 'tc':tc}
            )
        response={
            'id_data':str(id_data),
            'id':id,
            'name':name,
            'salary':salary,
            'tc':tc
        }
        return response
    else:
        not_found()
    return {'message':'Register sucessfuly'}

@app.route('/instructors', methods=['GET'])
def get_instructors():
    users=mongo.db.instructors.find()
    response=json_util.dumps(users)
    return Response(response,mimetype='application/json')

@app.route('/instructor/<id>', methods=['GET'])
def get_instructor(id):
    instructor=mongo.db.instructors.find_one({'_id':ObjectId(id)})
    print(instructor)
    response=json_util.dumps(instructor)
    return response

@app.route('/instructor/<id>',methods=['DELETE'])
def delete(id):
    print(id)
    mongo.db.instructors.delete_one({'_id':ObjectId(id)})
    response=jsonify({'message':'Instructor ' + id + ' fue eliminado'})
    return response

@app.route('/instructor/<id>', methods=['PUT'])
def update(id):        
    name=request.json['name']
    salary=request.json['salary']
    tc=request.json['tc']

    if name and salary and tc:
        mongo.db.instructors.update_one({'_id':ObjectId(id)}, {'$set':{
            'name':name,
            'salary':salary,
            'tc':tc
        }})
        response=jsonify({'message': 'Instructor ' + id + 'fue actualizado'})
        return response

@app.errorhandler(404)
def not_found(error=None):
    response=jsonify({
        'message':'RESOURCE NOT FOUND:' + request.url,
        'status':404
    })
    response.status_code=404
    return response

if __name__=='__main__':
    app.run(debug=True)
