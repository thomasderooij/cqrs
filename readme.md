## Cqrs

## Install

Require this package with composer using the following command:

```bash
composer require thomasderooij/cqrs
```

## Docs
It's a set of classes to create a clear distinction between commands, or things that write and do stuff,
and queries, things that fetch you information.

The setup is simple. Create a command or query. Your constructor should receive the data is needs to complete its task.
Any dependencies should also be instantiated here. I personally use singletons, but implement is however you like.

Your commands and queries have 3 protected functions;
* Run (your actual code)
* isSatisfied (a function that should check whether you can execute the code)
* Exception (the exception that will be thrown if isSatisfied returns false)

The traits canCommand and canQuery set up a class to run your commands and queries.

Quick example:
You have a command called StoreFileCommand. It takes a file location from your request as a constructor argument.
* The run function actually moves it to a dedicated directory, and makes a database entry so you can get your file later on.
* The isSatisfied function checks the file extension, size and other limitations you might want to put on your files.
* The Exception function returns a new FileTooBig exception to throw when the file is too big.

Your controller says $this->execute(new StoreFileCommand($fileLocation, $targetLocation)); and bam. File is stored. Clean, reusable. Lovely.

This is a basic package without any implementation of database transactions.
As such, it will throw exceptions when you don't create your own implementation of the Transactions trait. So yea, this is
not an out-of-the-box thing. Good luck and have fun.