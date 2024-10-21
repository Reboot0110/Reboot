# create_db.py - This script is to create the database and table.

import sqlite3

def create_database():
    conn = sqlite3.connect('exam_results.db')
    cursor = conn.cursor()

    # Create a table for exam results
    cursor.execute('''
    CREATE TABLE IF NOT EXISTS exam_results (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        student_name TEXT,
        score INTEGER,
        date_taken TEXT
    )
    ''')

    conn.commit()
    conn.close()

# Run this to create the database
create_database()