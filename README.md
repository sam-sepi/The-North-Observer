# The North Observer
![North Observer](https://github.com/sam-sepi/The-North-Observer/blob/master/img/observer.jpg)

*The North Remembers Observer pattern and Standard PHP Library*

**The North Observer** was an exercise with the [PHP Standard PHP Library](http://php.net/manual/en/book.spl.php) and the design pattern [Observer](https://en.wikipedia.org/wiki/Observer_pattern).

## Getting Start

The Deaths class is the *Subject* of the Observer pattern and implements the related interface which provides the *attach, detach, notify* methods with which to communicate with the *Observers*. It also implements the *JsonSerializable* interface so as to write every update of the object within a .json document (i.e. the death of the various characters within the series *A Song Of Ice and Fire*). The class notifies observers of their status update. It is the *addDeath* method that allows you to update the class's *death* property.


```php
use North\Deaths;

$deaths = new Deaths();
                //Nome, Casa, Titolo del libro
$deaths->addDeath('Weimar', 'Royce', 'A game of thrones');
```


*Observers* are the main houses in the North of Westeros, a world created by George RR Martin for the series *A Song of Ice and Fire*. Upon notification of the change of state of the *Subject* (an update of the deaths in the main books), Observers they react by updating themselves and changing the list of live or dead members of the House. *Observers* extend the abstract class *House* which implements the *SplObserver* interface and the related *update* method.
    
```php
use North\Deaths;
use North\Mormont;
use North\Stark;
use North\Karstark;

$deaths = new Deaths('deaths.json');
$print = $deaths->getDeaths();
$mormont = new Mormont();
$stark = new Stark();
$karstark = new Karstark();

$deaths->attach($mormont); //observ. binds
$deaths->attach($stark);
$deaths->attach($karstark);
$deaths->notify(); //notify changes
```

## Author
Sam Sepi - Initial work

## License
This project is licensed under the MIT License - see the LICENSE.md file for details
