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
1. Clone this repository into htdocs (or wherever you are serving your php projects).
2. Start MAMP
3. Open http://localhost:8888/fake-news/public

NOTE
  >If you decide to rename the project folder you also have to switch out the "BASE_URL" in the ".env" file. Just switch out the "/fake-news" part with the new name.
  
  >The website will only work when served with Apache due to the use of .htaccess files

## Usage
There are 2 different accounts you can use to test admin functionality.
Admins can edit and delete all articles. Writers can edit and delete their own articles.
Both can create new articles.
- Email: eric.andre@gmail.com | Password: admin | Role: Admin
- Email: sarah.green@gmail.com | Password: writer | Role: Writer

### User tests: 
- Linn Johansson
- André Broman

