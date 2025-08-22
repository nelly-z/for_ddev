<?php
namespace App\Tests\Functional;

class FeedbackTest extends WebTestCaseWithUser
{
    public function testSubmitFeedback(): void
    {
        $client = static::createClient();
        $this->createUserAndLogin($client);

        $crawler = $client->request('GET', '/feedback');
        $this->assertResponseIsSuccessful();

        $form = $crawler->selectButton('Submit feedback')->form([
            'feedback_form[dateVisited]' => (new \DateTime())->format('Y-m-d'),
            'feedback_form[overallRating]' => 5,
            'feedback_form[comments]' => 'Great!',
        ]);
        $client->submit($form);
        $this->assertResponseRedirects('/feedback/thanks');
        $client->followRedirect();
        $this->assertSelectorTextContains('h1', 'Thank you');
    }
}