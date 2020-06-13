using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using TMPro;

public class MainMenu : MonoBehaviour
{
    public TextMeshProUGUI highscoreText;

    void Start()
    {
        if (PlayerPrefs.HasKey("highscore"))
            highscoreText.text = "Highscore: " + PlayerPrefs.GetInt("highscore").ToString();
    }

    public void play()
    {
        SceneManager.LoadScene("GameScene");
    }

    public void leaderboard()
    {

    }

    public void about()
    {

    }
}
