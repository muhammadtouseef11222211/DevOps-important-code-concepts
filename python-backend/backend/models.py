from datetime import datetime
import hashlib

class Blockchain:
    def __init__(self, db):
        self.chain = db.blockchain
        self.create_genesis_block()

    def create_genesis_block(self):
        if self.chain.count_documents({}) == 0:
            genesis_block = {
                'index': 0,
                'timestamp': 0,
                'data': 'Genesis Block',
                'previous_hash': '0',
                'hash': 'genesis_hash'
            }
            self.chain.insert_one(genesis_block)

    def add_block(self, data):
        previous_block = self.chain.find_one(sort=[('_id', -1)])
        new_block = {
            'index': previous_block['index'] + 1,
            'timestamp': datetime.now().timestamp(),
            'data': data,
            'previous_hash': previous_block['hash'],
            'hash': self.calculate_hash(data, previous_block['hash'])
        }
        self.chain.insert_one(new_block)
        return new_block

    def calculate_hash(self, data, previous_hash):
        data_str = str(data) + str(previous_hash)
        return hashlib.sha256(data_str.encode('utf-8')).hexdigest()
