<?php
?>
<div id="calendar-block">
    <div id="calendar"></div>
</div>

<script>

    function runScript() {
        !function () {
            var today = moment();
            moment.updateLocale('en', {
                weekdaysShort : ["Ндл", "Пнд", "Втр", "Срд", "Чтв", "Птн", "Сбт"],
                months : [
                    "Січень", "Лютий", "Березень", "Квітень", "Травень", "Червень",
                    "Липень", "Серпень", "Вересень", "Жовтень", "Листопад", "Грудень"
                ],
                week: {
                    dow: 6
                }
            });

            function Calendar(selector, events) {
                this.el = document.querySelector(selector);
                this.allEvents = events;
                this.current = moment().date(1);
                this.setCurrentMonthEvents();
                this.draw();
                var current = document.querySelector('.today');
                if (current) {
                    var self = this;
                    window.setTimeout(function () {
                        self.openDay(current);
                    }, 500);
                }
            }

            Calendar.prototype.draw = function () {
                //Create Header
                this.drawHeader();

                //Draw Month
                this.drawMonth();

                this.drawLegend();
            }

            Calendar.prototype.drawHeader = function () {
                var self = this;
                if (!this.header) {
                    //Create the header elements
                    this.header = createElement('div', 'header');
                    this.header.className = 'header';

                    this.title = createElement('h1');

                    var right = createElement('div', 'right');
                    right.addEventListener('click', function () {
                        self.nextMonth();
                    });

                    var left = createElement('div', 'left');
                    left.addEventListener('click', function () {
                        self.prevMonth();
                    });

                    //Append the Elements
                    this.header.appendChild(this.title);
                    this.header.appendChild(right);
                    this.header.appendChild(left);
                    this.el.appendChild(this.header);
                }

                this.title.innerHTML = this.current.format('MMMM YYYY');
            }

            Calendar.prototype.drawMonth = function () {
                var self = this;
                this.setCurrentMonthEvents();

                self.events.forEach(function (ev) {
                    ev.date = self.current.clone().date(ev.dayOfMount);
                });


                if (this.month) {
                    this.oldMonth = this.month;
                    this.oldMonth.className = 'month out ' + (self.next ? 'next' : 'prev');
                    this.oldMonth.addEventListener('webkitAnimationEnd', function () {
                        self.oldMonth.parentNode.removeChild(self.oldMonth);
                        self.month = createElement('div', 'month');
                        self.backFill();
                        self.currentMonth();
                        self.fowardFill();
                        self.el.appendChild(self.month);
                        window.setTimeout(function () {
                            self.month.className = 'month in ' + (self.next ? 'next' : 'prev');
                        }, 16);
                    });
                } else {
                    this.month = createElement('div', 'month');
                    this.el.appendChild(this.month);
                    this.backFill();
                    this.currentMonth();
                    this.fowardFill();
                    this.month.className = 'month new';
                }
            }

            Calendar.prototype.backFill = function () {
                var clone = this.current.clone();
                var dayOfWeek = clone.day() - 1;

                if (!dayOfWeek) {
                    return;
                }

                clone.subtract('days', dayOfWeek + 1);

                for (var i = dayOfWeek; i > 0; i--) {
                    this.drawDay(clone.add('days', 1));
                }
            }

            Calendar.prototype.fowardFill = function () {
                var clone = this.current.clone().add('months', 1).subtract('days', 1);
                var dayOfWeek = clone.day();

                if (dayOfWeek === 7) {
                    return;
                }

                for (var i = dayOfWeek; i < 7; i++) {
                    this.drawDay(clone.add('days', 1));
                }
            }

            Calendar.prototype.currentMonth = function () {
                var clone = this.current.clone();

                while (clone.month() === this.current.month()) {
                    this.drawDay(clone);
                    clone.add('days', 1);
                }
            }

            Calendar.prototype.getWeek = function (day) {
                if (!this.week || day.day() === 1) {
                    this.week = createElement('div', 'week');
                    this.month.appendChild(this.week);
                }
            }

            Calendar.prototype.drawDay = function (day) {
                var self = this;
                this.getWeek(day);

                //Outer Day
                var outer = createElement('div', this.getDayClass(day));
                outer.addEventListener('click', function () {
                    self.openDay(this);
                });

                //Day Name
                var name = createElement('div', 'day-name', day.format('ddd'));

                //Day Number
                var number = createElement('div', 'day-number', day.format('DD'));


                //Events
                var events = createElement('div', 'day-events');
                this.drawEvents(day, events);

                outer.appendChild(name);
                outer.appendChild(number);
                outer.appendChild(events);
                this.week.appendChild(outer);
            }

            Calendar.prototype.drawEvents = function (day, element) {
                if (day.month() === this.current.month()) {
                    var todaysEvents = this.events.reduce(function (memo, ev) {
                        if (ev.date.isSame(day, 'day')) {
                            memo.push(ev);
                        }
                        return memo;
                    }, []);

                    todaysEvents.forEach(function (ev) {
                        var evSpan = createElement('span', ev.color);
                        element.appendChild(evSpan);
                    });
                }
            }

            Calendar.prototype.getDayClass = function (day) {
                classes = ['day'];
                if (day.month() !== this.current.month()) {
                    classes.push('other');
                } else if (today.isSame(day, 'day')) {
                    classes.push('today');
                }
                return classes.join(' ');
            }

            Calendar.prototype.openDay = function (el) {
                var details, arrow;
                var dayNumber = +el.querySelectorAll('.day-number')[0].innerText || +el.querySelectorAll('.day-number')[0].textContent;
                var day = this.current.clone().date(dayNumber);

                var currentOpened = document.querySelector('.details');

                //Check to see if there is an open detais box on the current row
                if (currentOpened && currentOpened.parentNode === el.parentNode) {
                    details = currentOpened;
                    arrow = document.querySelector('.arrow');
                } else {
                    //Close the open events on differnt week row
                    //currentOpened && currentOpened.parentNode.removeChild(currentOpened);
                    if (currentOpened) {
                        currentOpened.addEventListener('webkitAnimationEnd', function () {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.addEventListener('oanimationend', function () {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.addEventListener('msAnimationEnd', function () {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.addEventListener('animationend', function () {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.className = 'details out';
                    }

                    //Create the Details Container
                    details = createElement('div', 'details in');

                    //Create the arrow
                    var arrow = createElement('div', 'arrow');

                    //Create the event wrapper

                    details.appendChild(arrow);
                    el.parentNode.appendChild(details);
                }

                var todaysEvents = this.events.reduce(function (memo, ev) {
                    if (ev.date.isSame(day, 'day')) {
                        memo.push(ev);
                    }
                    return memo;
                }, []);

                this.renderEvents(todaysEvents, details);

                arrow.style.left = el.offsetLeft - el.parentNode.offsetLeft + 27 + 'px';
            }

            Calendar.prototype.renderEvents = function (events, ele) {
                //Remove any events in the current details element
                var currentWrapper = ele.querySelector('.events');
                var wrapper = createElement('div', 'events in' + (currentWrapper ? ' new' : ''));

                events.forEach(function (ev) {
                    var div = createElement('div', 'event');
                    var square = createElement('div', 'event-category ' + ev.color);
                    var span = createElement('span', '', ev.eventName);

                    div.appendChild(square);
                    div.appendChild(span);
                    wrapper.appendChild(div);
                });

                if (!events.length) {
                    var div = createElement('div', 'event empty');
                    var span = createElement('span', '', 'На цю дату нічого не заплановано');

                    div.appendChild(span);
                    wrapper.appendChild(div);
                }

                if (currentWrapper) {
                    currentWrapper.className = 'events out';
                    currentWrapper.addEventListener('webkitAnimationEnd', function () {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                    currentWrapper.addEventListener('oanimationend', function () {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                    currentWrapper.addEventListener('msAnimationEnd', function () {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                    currentWrapper.addEventListener('animationend', function () {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                } else {
                    ele.appendChild(wrapper);
                }
            }

            Calendar.prototype.drawLegend = function () {
                var legendBlock = document.getElementById('calendar').getElementsByClassName('legend');
                if (legendBlock.length) {
                    legendBlock[0].parentNode.removeChild(legendBlock[0]);
                }
                var legend = createElement('div', 'legend');
                var calendars = this.events.map(function (e) {
                    return e.calendar + '|' + e.color;
                }).reduce(function (memo, e) {
                    if (memo.indexOf(e) === -1) {
                        memo.push(e);
                    }
                    return memo;
                }, []).forEach(function (e) {
                    var parts = e.split('|');
                    var entry = createElement('span', 'entry ' + parts[1], parts[0]);
                    legend.appendChild(entry);
                });
                this.el.appendChild(legend);
            }

            Calendar.prototype.nextMonth = function () {
                this.current.add('months', 1);
                this.next = true;
                this.draw();
            }

            Calendar.prototype.prevMonth = function () {
                this.current.subtract('months', 1);
                this.next = false;
                this.draw();
            }

            Calendar.prototype.setCurrentMonthEvents = function () {
                var currentDate = new Date(this.current._d + ''),
                    currentMonth = currentDate.getFullYear() + '-' + (currentDate.getUTCMonth() + 1),
                    currentMonthEvents = this.allEvents[currentMonth];
                this.events = currentMonthEvents === undefined ? [] : currentMonthEvents;
            }

            window.Calendar = Calendar;

            function createElement(tagName, className, innerText) {
                var ele = document.createElement(tagName);
                if (className) {
                    ele.className = className;
                }
                if (innerText) {
                    ele.innderText = ele.textContent = innerText;
                }
                return ele;
            }
        }();

        !function () {
            var events, calendar, colors = {
                'Спилювання дерев в аварійному стані': 'black',
                'Реконструкція парку': 'blue',
                'Посадка дерев': 'green',
                'Планове спилювання дерев': 'red',
                'Перевірка стану дерев': 'yellow',
            };
            axios.get('/api/data.json')
                .then(function (response) {
                    events = response.data;
                    createCalendar();
                });

            function createCalendar() {
                var data = {};
                events.forEach(function (event) {
                    var date = event.date.split('.'), month = date[2] + '-' + (date[1] * 1);
                    if (typeof data[month] === 'undefined') {
                        data[month] = [];
                    }
                    data[month].push({
                        eventName: event.description,
                        calendar: event.type,
                        color: colors[event.type],
                        dayOfMount: date[0] * 1,
                    });
                });

                calendar = new Calendar('#calendar', data);
            }

        }();


    }
</script>