from app import app, mongo
from flask import jsonify, request
from models import Blockchain

@app.route('/')
def home():
    try:
        # Test the MongoDB connection
        mongo.db.command('ping')
        return jsonify({'status': 'success', 'message': 'MongoDB connection OK. Hello, World!'})
    except Exception as e:
        return jsonify({'status': 'error', 'message': 'MongoDB connection failed. ' + str(e)})

@app.route('/add_block', methods=['POST'])
def add_block():
    data = request.json.get('data') # Assuming the data is passed as form data
    blockchain = Blockchain(mongo.db)  # Create an instance of Blockchain
    blockchain.add_block(data)  # Call add_block method on the instance
    return 'Block added successfully'
