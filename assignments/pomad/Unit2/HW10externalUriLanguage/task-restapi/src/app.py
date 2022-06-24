from flask import Flask, Response, jsonify, request
from flask_pymongo import PyMongo
from bson import json_util
from bson.objectid import ObjectId

app = Flask(__name__)

app.config['MONGO_URI'] = 'mongodb://localhost/task_restapi'
#CONNECTION_STRING  = 'mongodb+srv://dnpoma:12345@webuniversity.po9hy.mongodb.net/?retryWrites=true&w=majority'
#client = pymongo.MongoClient(CONNECTION_STRING)
#db = client.get_database('university_managment')
#user_collection = pymongo.collection.Collection(db, 'task')

mongo = PyMongo(app)

#ruta que permita crear tareas
@app.route('/tasks', methods=['POST'])
def create_tasks():
    # Receiving Data
    id = request.json['id']
    description  = request.json['description']
    category  = request.json['category']
    date = request.json['date']
    done = request.json['done']

    if id and description:
        mongo.db.tasks.insert_one({'id':id, 'description':description, 'category':category, 'date':date, 'done':done})
        response = {
            'id': str(id),
            'description': description,
            'category': category,
            'date': date,
            'done': done
        }
        return response
    else:
        return not_found()

    return {'message':'received'}

@app.route('/tasks', methods=['GET'])
def get_tasks():
    tasks = mongo.db.tasks.find()
    response = json_util.dumps(tasks)
    return Response(response, mimetype='application/json')

@app.route('/tasks/<id>', methods=['GET'])
def get_task(id):
    task = mongo.db.tasks.find_one({'id':id})
    response =  json_util.dumps(task)
    return Response(response, mimetype="application/json")

@app.route('/tasks/<id>', methods=['DELETE'])
def delete_task(id):
    mongo.db.tasks.delete_one({'id':id})
    response =  jsonify({'message': 'Task' + id + ' Deleted Successfully'})
    response.status_code = 200
    return response

@app.route('/tasks/<id>', methods=['PUT'])
def update_task(id):
    id = request.json['id']
    description  = request.json['description']
    category  = request.json['category']
    date = request.json['date']
    done = request.json['done']

    if id and description and category and date and done:
        mongo.db.users.update_one(
            {'$set': {'id': id, 'description': description, 'category': category, 'date': date, 'done': done}})
        response = jsonify({'message': 'Id' + id + 'Updated Successfuly'})
        response.status_code = 200
        return response
    else:
      return not_found()


@app.errorhandler(404)
def not_found(error=None):
    response = jsonify({
        'message': 'Resource Not Found'+ request.url,
        'status':404
    })
    response.status_code = 404
    return response



if __name__ == "__main__":
    app.run(debug=True)