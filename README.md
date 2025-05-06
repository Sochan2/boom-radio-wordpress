# boom-radio project convert into Wordpress

This readme file is instruction to contribute as development. Please follow these steps and enjoy this boom radio development.

##1: clone repository:
```bash
git clone https://github.com/Sochan2/boom-radio-wordpress.git
```

##2: Create new branch for your work.
We do not work on same branch for same person. You will make your own branch and address the issue which is made in Github. If you complete every issue, it is the goal.
 - when you create your branch, use this name

 ```bash
 git checkout -b issue-#<issue-number>-<short description>
 ```
 example like this: 

 ```
 git checkout -b issue-#10-make-navigation
 ```

 ##3: Work on your branch
  - **Make sure before you start, please do "git pull origin mail"**
Then, you can start working your own allocated job. 

#4: When you push to git 
```bash
git add .
git commit -m "<commit message>"
```
If you only push particular file, code like this:
```
git add themes/boomradio/header.php themes/boomradio/footer.php
```
##4 Make Pull request (PR)
This is very important part. We want to know what you have done and where did you change, what job did you work on and some message as well if they have any other issue. In this pull request, at least one review.So, once you create a pull request, please send message on chat and check the chat consistantly.

1. after you commit, go to gitHub and the bar comes down altomatically to make PR. And you click this.
2. Fill out the detail in the PR template
3. Link the PR to the issue by inclusing `Fixes #<issue-number>` in the description. I think it automatically appears.

**Require to write**
Description: What did you change and what is the objective of this PR. 
Changes Made: What did you change? Which file did you change? What did you add and delete?
Checklist: no need to write. If you want us to check something, please write.
Screenshot: For our convenience you can add. How is it working like that.
Note: If you have nay comment... most of the time not necessary.

##4-2 Check Pull Request
When you check someone's Pull Request, please do like this.
1. Go to Pull request tab
2. Select PR
3. click review PR. If you click that, I think you can check code. If you think it's good, accept that.
4. If you think it's not good job, fix that and push to same branch and give the commit message.

> [!NOTE]
> If you push to same branch and another commit, it is automatically reflected. So, you don't have to make new PR!!

If you have any questions, I always happy to answer anywhere. Probably in chat is better! Hopefully this project goes well.

