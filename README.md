# Fake News

This project is a news website.
It contains the following features:

- Authentication with simple roles system
- Articles CRUD
- Featured & popular articles lists
- Latest news (Sorted by date)
- Single article page
- Author page containing articles made by specified user

## Installation

1. Clone this repository into wherever you are serving your php projects.
2. Start Server.
3. If you are using Mamp or similar please read notes beneath.
4. Open http://localhost:8888/

NOTE

> If you host your project in mamp you also need to add folder name to the end of the "BASE_URL" in the .env file. Example: http://localhost:8888/fake-news

> Also if you are using another port than :8888 you need to change it in the ".env" file.

## Usage

There are 2 different accounts you can use to test admin functionality.
Admins can edit and delete all articles. Writers can edit and delete their own articles.
Both can create new articles.

- Email: eric.andre@gmail.com | Password: admin | Role: Admin
- Email: sarah.green@gmail.com | Password: writer | Role: Writer

### User tests:

- Linn Johansson
- André Broman
