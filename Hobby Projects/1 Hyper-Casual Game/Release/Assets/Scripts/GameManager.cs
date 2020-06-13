using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using TMPro;

public class GameManager : MonoBehaviour
{
    public TextMeshProUGUI highscoreText;
    public TextMeshProUGUI scoreText;
    public TextMeshProUGUI gameOverText;
    public GameObject gameOverGui;
    public GameObject player;
    public GameObject item;

    int score = 0;
    int highscore = 0;
    bool newHighscore = false;

    void Start()
    {
        if (PlayerPrefs.HasKey("highscore"))
            updateHighscore(PlayerPrefs.GetInt("highscore"));

        updateScore();
        newItemLoc();
    }

    void updateScore()
    {
        scoreText.text = "Score: " + score.ToString();
    }

    public void incrementScore()
    {
        score++;
        updateScore();
    }

    void updateHighscore(int val)
    {
        highscore = val;
        highscoreText.text = "Highscore: " + highscore.ToString();
        PlayerPrefs.SetInt("highscore", highscore);
    }

    public void checkHighscore()
    {
        if (score > highscore) {
            newHighscore = true;
            updateHighscore(score);
        }
    }

    public void clearHighscore()
    {
        updateHighscore(0);
    }

    public void newItemLoc()
    {
        Vector3 screenBounds = Camera.main.ScreenToWorldPoint(new Vector3(Screen.width, Screen.height, 0));
        float itemWidth = item.transform.GetComponent<SpriteRenderer>().bounds.size.x;
        float itemHeight = item.transform.GetComponent<SpriteRenderer>().bounds.size.y;

        float x = Random.Range(screenBounds.x * -1 + itemWidth, screenBounds.x - itemWidth);
        float y = Random.Range(screenBounds.y * -1 + itemHeight, screenBounds.y - itemHeight);

        Vector3 newPos = new Vector3(x, y, 0);
        item.transform.position = newPos;
    }

    public void gameOver()
    {
        checkHighscore();

        if (newHighscore)
        {
            gameOverText.text = "Congratulations \nNew Highscore \n\n" + highscore.ToString();
        }
        else
        {
            gameOverText.text = "Game Over \n\nScore: " + score.ToString() + "\n\nHighscore: " + highscore.ToString() + "\n";
        }

        player.SetActive(false);
        item.SetActive(false);
        gameOverGui.SetActive(true);
    }

    public void restart()
    {
        SceneManager.LoadScene(SceneManager.GetActiveScene().name);
    }

    public void mainMenu()
    {
        SceneManager.LoadScene("MainMenuScene");
    }
}
