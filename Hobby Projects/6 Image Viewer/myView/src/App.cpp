#include "App.h"


App::App(std::string path) {
	int monWidth = sf::VideoMode::getDesktopMode().width;
	int monHeight = sf::VideoMode::getDesktopMode().height;

	window = new sf::RenderWindow(sf::VideoMode(monWidth * 5/6, monHeight * 5/6), WINDOW_TITLE, sf::Style::None);
	//window->setIcon(icon_image.width, icon_image.height, icon_image.pixel_data);
	window->setPosition(sf::Vector2i((monWidth - window->getSize().x) / 2, (monHeight - window->getSize().y) / 2));

	titleBar = new TitleBar(0, 0, window->getSize().x, BAR_HEIGHT);
	menuBar = new MenuBar(0, titleBar->getY() + titleBar->getHeight(), window->getSize().x, BTN_SIZE);
	mainArea = new MainArea(0, menuBar->getY() + menuBar->getHeight(), window->getSize().x, window->getSize().y);
	mainArea->setImage(path);
}

App::~App() {
	delete titleBar;
	delete menuBar;
	delete mainArea;
	delete window;

	titleBar = nullptr;
	menuBar = nullptr;
	mainArea = nullptr;
	window = nullptr;
}


void App::input() {
	sf::Event event;
	while (window->pollEvent(event)) {
		if (event.type == sf::Event::Closed) {
			window->close();
		} else if (event.type == sf::Event::Resized) {
			window->setView(sf::View(sf::FloatRect(0, 0, event.size.width, event.size.height)));

			titleBar->onWindowResize(window->getSize().x);
			menuBar->onWindowResize(window->getSize().x);
			mainArea->onWindowResize(window->getSize().x, window->getSize().y);
		}

		if (event.type == sf::Event::MouseMoved) {
			titleBar->onHover(event.mouseMove.x, event.mouseMove.y);
			menuBar->onHover(event.mouseMove.x, event.mouseMove.y);
		}

		if (event.type == sf::Event::MouseButtonPressed) {
			if (event.mouseButton.button == sf::Mouse::Left) {
				sf::IntRect area = titleBar->getDraggable();

				bool cond1 = event.mouseButton.x >= area.left;
				bool cond2 = event.mouseButton.x <= area.left + area.width;
				bool cond3 = event.mouseButton.y >= area.top;
				bool cond4 = event.mouseButton.y <= area.top + area.height;

				if (cond1 && cond2 && cond3 && cond4) {
					windowDrag = true;
					titleBarClickLocX = event.mouseButton.x;
					titleBarClickLocY = event.mouseButton.y;
				}

				mainArea->onPress(event.mouseButton.x, event.mouseButton.y);
			}
		}

		if (event.type == sf::Event::MouseButtonReleased) {
			if (event.mouseButton.button == sf::Mouse::Left) {
				if (windowDrag) {
					windowDrag = false;
				} else {
					titleBar->onClick(event.mouseButton.x, event.mouseButton.y, *window);
					menuBar->onClick(event.mouseButton.x, event.mouseButton.y, mainArea->getImage());
					mainArea->onClick(event.mouseButton.x, event.mouseButton.y);

					mainArea->onRelease();
				}
			}
		}
	}
}

void App::update() {
	if (windowDrag) {
		int locX = sf::Mouse::getPosition().x - titleBarClickLocX;
		int locY = sf::Mouse::getPosition().y - titleBarClickLocY;

		window->setPosition(sf::Vector2i(locX, locY));
	}

	mainArea->update(*window);
}

void App::show() {
	window->clear(sf::Color(0x090B10FF));
	
	mainArea->show(*window);
	menuBar->show(*window);
	titleBar->show(*window);
	
	window->display();
}


void App::run() {
	while (window->isOpen()) {
		input();
		update();
		show();
	}
}

