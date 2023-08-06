from flask import Flask
from flask_pymongo import PyMongo
from models import Blockchain

app = Flask(__name__)
app.config['MONGO_URI'] = 'mongodb://54.169.6.24:27017/blockchain'
app.config['DEBUG'] = True
mongo = PyMongo(app)

blockchain = Blockchain(mongo.db)

from routes import *

if __name__ == '__main__':
    app.run()






