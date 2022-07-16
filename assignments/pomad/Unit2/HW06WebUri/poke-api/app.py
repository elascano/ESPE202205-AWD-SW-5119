from flask import Flask, json, render_template, jsonify, request
from random import randint
import requests

app = Flask(__name__)

def saveRecentPokemon(d):
    with open('recentPokemon.json', 'w') as f:
        json.dump(d, f, indent=4)

def loadRecentOPokemon():
    with open('recentPokemon.json', 'r') as f:
        return json.load(f)

@app.route("/", methods=['GET'])
def route():
    pokemons = []
    for x in range(10):
        number = str(randint(1,151))
        baseapi = f'https://pokeapi.co/api/v2/pokemon/{number}'
        response = requests.get(baseapi).json()
        data = {
            'number': number,
            'name': response['name'].upper(),
            'speed': response['stats'][-1]['base_stat'],
            'defense': response['stats'][2]['base_stat'],
            'special_defense': response['stats'][4]['base_stat'],
            'attack': response['stats'][1]['base_stat'],
            'special_attack': response['stats'][3]['base_stat'],
            'hp': response['stats'][0]['base_stat'],
            'weight': response['weight'],
            'image_url': response['sprites']['other']['dream_world']['front_default']
        }
        pokemons.append(data)

    recentPokemon = loadRecentOPokemon()
    return render_template('index.html',pokemons=pokemons, recentPokemon=recentPokemon)

@app.route('/<id>', methods=['GET'])
def random_id(id):
    pokemons = []
    baseapi = f'https://pokeapi.co/api/v2/pokemon/{id}'
    response = requests.get(baseapi).json()
    data = {
        'number': id,
        'name': response['name'].upper(),
        'speed': response['stats'][-1]['base_stat'],
        'defense': response['stats'][2]['base_stat'],
        'special_defense': response['stats'][4]['base_stat'],
        'attack': response['stats'][1]['base_stat'],
        'special_attack': response['stats'][3]['base_stat'],
        'hp': response['stats'][0]['base_stat'],
        'weight': response['weight'],
        'image_url': response['sprites']['other']['dream_world']['front_default']
    }
    pokemons.append(data)
    #Show a super pokemon uwu
    return json.dumps(pokemons) 

@app.route('/random_pokemon', methods=['GET'])
def random_pokemon():
    number = str(randint(1,151))
    baseapi = f'https://pokeapi.co/api/v2/pokemon/{number}'
    r = requests.get(baseapi).json()
    d = {
        'number': number,
        'name': r['name'].upper(),
        'speed': r['stats'][-1]['base_stat'],
        'defense': r['stats'][2]['base_stat'],
        'special_defense': r['stats'][4]['base_stat'],
        'attack': r['stats'][1]['base_stat'],
        'special_attack': r['stats'][3]['base_stat'],
        'hp': r['stats'][0]['base_stat'],
        'weight': r['weight'],
        'image_url': r['sprites']['other']['dream_world']['front_default']
    }
    saveRecentPokemon(d)
    return jsonify(d)


@app.route('/saveRecentPokemon', methods=['POST'])
def save_recent_pokemon():
    request_info = request.get_json(force=True)
    saveRecentPokemon(request_info)
    return {'message': 'successful'}



if __name__ == "__main__":
    app.run(debug=True)
